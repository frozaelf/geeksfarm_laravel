<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticlesRequest;
use App\Comment;
use PDF;
use Auth;
use Illuminate\Support\Collection;
use Datatables;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {

        // $this->middleware('auth');
		 $this->middleware('admin', ['except' => ['show','page','pagination','searching','sorting']]);
	
	  }
	 
	 public function ajax(Request $request)

  {

    $articles = Article::paginate(4);//->toJson();

    if ($request->ajax()) {

   

      $view = (String) view('articles.list')

        ->with('articles', $articles)

        ->render();

      return response()->json(['view' => $view]);
    } else {

      return view('articles.ajax')

        ->with('articles', $articles);

    }

  }
   public function pagination(Request $request)

  {
      $articles = Article::paginate(2);

    if($request->ajax()) {


      $view = (String) view('articles.list')

        ->with('articles', $articles)

        ->render();

      return response()->json(['view' => $view]);

    } else {

      $articles = Article::paginate(2);

      return view('articles.pagination')

        ->with('articles', $articles);

    }

  }
   public function searching(Request $request)
  {
      $articles = Article::paginate(2);
    if($request->ajax()) {
      if($request->input('keywords')) {
      $articles = Article::where('title', 'like', '%'.$request->input('keywords').'%')
          ->orWhere('content', 'like', '%'.$request->input('keywords').'%')

          ->paginate(2);

      }

      $view = (String) view('articles.list')

        ->with('articles', $articles)

        ->render();

      return response()->json(['view' => $view]);

    } else {

      $articles = Article::paginate(2);

      return view('articles.searching')

        ->with('articles', $articles);

    }

  }
  function sorting(Request $request) {

  if($request->ajax()) {

    $articles = Article::orderBy('id', $request->input('direction'))

      ->paginate(2);

    $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';

    $view = (String)view('articles.sorting_list')

      ->with('articles', $articles)

      ->render();

    return response()->json(['view' => $view, 'direction' => $direction]);

  } else {

    $articles = Article::orderBy('created_at', 'desc')->paginate(2);

    return view('articles.sorting')

      ->with('articles', $articles);

  }

}
    public function index()
    {
        //

    // $articles = Article::all();
// 
    // return view('articles.index')->with('articles', $articles);
	    return view('articles.datatables');
    }

    public function page()
    {
        //

    $articles = Article::all();

    return view('articles.page')->with('articles', $articles);
	  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {

      $article = new Article;
      $article->title = $request->input('title');
      $article->content = $request->input('content');
      $article->author = $request->input('author');
     if($request->hasFile('image')) {
			createdirYmd('storage');
            $file = Input::file('image');            
            $name = str_random(20). '-' .$file->getClientOriginalName();  
            $article->image = date("Y")."/".date("m")."/".date("d")."/".$name;			
            $file->move(public_path().'/storage/'.date("Y")."/".date("m")."/".date("d")."/", $name);
        }
      $article->save();

    Session::flash('notice', 'Success add article');

    return Redirect::to('articles');

  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
	  {
	
	    $article = Article::with('comments.user')->where('slug', '=', $id)->firstOrFail();
	
	    $comments = $article->comments->sortBy('Comment.created_at');
	
	    return view('articles.show')
	
	      ->with('article', $article)
	
	      ->with('comments', $comments);
	
	  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);

    return view('articles.edit')

      ->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $article = Article::find($id);
      $article->title = $request->input('title');
      $article->content = $request->input('content');
      $article->author = $request->input('author');

      // if user choose a file, replace the old one //
      if( $request->hasFile('image') ){
		    if($article->image != ""){	
		    $image_path = public_path().'/storage/'.$article->image;
		    unlink($image_path);
			}
			createdirYmd('storage');
            $file = Input::file('image');            
            $name = str_random(20). '-' .$file->getClientOriginalName();            
            $article->image = date("Y")."/".date("m")."/".date("d")."/".$name;			
            $file->move(public_path().'/storage/'.date("Y")."/".date("m")."/".date("d")."/", $name);
			
      }else{
      			
      		$article->image = $article->image;
			
      }
        
      // replace old data with new data from the submitted form //
      $article->save();

      Session::flash('notice', 'Success update article');

      return Redirect::to('articles');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $article = Article::find($id);
	   	// if($article->image){
		    // $image_path = public_path().'/storage/'.$article->image;
		    // unlink($image_path);
		// }
    if ($article->delete()) {

      Session::flash('notice', 'Article success delete');

      return Redirect::to('articles');

    } else {

      Session::flash('error', 'Article fails delete');

      return Redirect::to('articles');

    }
    }
	/**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
	    return view('datatables.index');
	}
	
	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{
      $articles = Article::select(['id', 'image', 'title', 'content','slug']);

        return Datatables::of($articles)
            ->addColumn('action', function ($article) {
                return link_to('articles/'.$article->slug, 'Show', array('class' => 'btn btn-info btn-sm btn-raised')).link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning btn-sm btn-raised')).'<a href="'.'articles/delete/'.$article->id.'" data-method="delete" data-token="'.csrf_token().'"  onclick="return confirm('."'Are you sure?'".')" class="btn-sm btn btn-danger btn-raised">Delete</a>'.link_to('articles/getExportExcel/'.$article->slug, 'E Excel', array('class' => 'btn btn-primary btn-sm btn-raised')).link_to('articles/getExportPdf/'.$article->slug, 'E PDF', array('class' => 'btn btn-primary btn-sm btn-raised'));
            })
            ->editColumn('id', function ($article) {
                return "<input type='checkbox' name='id[]' value='".$article->id."'>";
            })
            ->editColumn('image', function ($article) {
				if ($article->image != ""){
				return "<img src='".asset('storage/'.$article->image)."' class='img-responsive' width='100px'>";  
				}
            })
            ->removeColumn('password')
            ->make(true);
	}

	public function getExportExcel($id='')
	{
		$article = Article::where('slug', '=', $id);
		$namefile = "Excel-Article-".$article->first()->slug;
		$comment = Comment::where('article_id', '=', $article->first()->id);
		$articleselect = $article;					
		$commentselect = $comment;
		Excel::create($namefile, function($excel) use($articleselect, $commentselect) {
		    $excel->sheet('Sheet 1', function($sheet) use($articleselect) {
		        $sheet->fromArray($articleselect->get());
		    });
		      $excel->sheet('Sheet 1', function($sheet) use($commentselect) {
		        $sheet->fromArray($commentselect->get());
		    });
		})->export('xls');
	}
	
	public function getImportExcel()
	{
			if(Input::hasFile('import_file')){

			$path = Input::file('import_file')->getRealPath();

			$data_from_excel = Excel::load($path, function($reader) {

			})->get();
			echo $data_from_excel.'<br><br>';
			if(!empty($data_from_excel) && $data_from_excel->count()){

			      $article = new Article;
			      $article->title = $data_from_excel[0][0]->title;
			      $article->content = $data_from_excel[0][0]->content;
			      $article->author = $data_from_excel[0][0]->author;
			      $article->created_at = $data_from_excel[0][0]->created_at;
			      $article->updated_at = $data_from_excel[0][0]->updated_at;
			      $article->save();
				$article_id = Article::where('slug', 'like', '%'.$data_from_excel[0][0]->slug.'%')->orderBy('id', 'desc')->first()->id;
				echo $article_id.'<br><br><br>';
				echo $data_from_excel[0][0].'<br><br>';
				echo $data_from_excel[1].'<br><br>';
				
				foreach ($data_from_excel[1] as $data) {					
			      $comment = new Comment;
			      $comment->article_id = $article_id;
			      $comment->user_id = $data->user_id;
			      $comment->content = $data->content;
			      $comment->created_at = $data->created_at;
			      $comment->updated_at = $data->updated_at;
			      $comment->save();
				}

			}

		}

		return back();
	}
	
	public function getExportPdf($id)
	{
		$filename = "Pdf-Article-".$id;
	    $article = Article::with('comments.user')->where('slug', '=', $id)->first();
	    $comment = $article->comments;
		$data['comments'] = $comment;		
		$data['articles'] = $article;
		// view()->share('articles',$article);
		// view()->share('comments',$comment);
            $pdf = PDF::loadView('articles.ExportPdf', $data);

            return $pdf->download($filename);

	}
}
