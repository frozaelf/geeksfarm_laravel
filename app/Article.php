<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{
   protected $fillable = [

      'title', 'content', 'author', 'images',

    ];
	protected $hidden = array('id');
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // public static function valid($id='') {
// 
      // return array(
// 
        // 'title' => 'required|min:10|unique:articles,title'.($id ? ",$id" : ''),
// 
        // 'content' => 'required|min:100|unique:articles,content'.($id ? ",$id" : ''),
// 
        // 'author' => 'required'
// 
      // );
// 
    // }
	public static function valid() {
	
	    return array(
	
	      'content' => 'required'
	
	     );
	
	  }
	public function comments() {

    return $this->hasMany('App\Comment');

  	}
  }
