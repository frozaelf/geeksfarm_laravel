@foreach ($articles as $article)

<div class="panel panel-primary">
	<div class="panel-body">
		<h4>{{$article->title}}</h4>
		<?php echo "<img src='" . asset('storage/' . $article -> image) . "' class='pull-left img-responsive thumb img-thumbnail m-r' width='100px'>"; ?>
		<article>
			<p>
				{{$article->content}}
			</p>
		</article>
		{{ link_to('articles/'.$article->slug, 'Show', array('class' => 'btn btn-primary btn-sm btn-raised')) }}
	</div>
</div>

@endforeach
{!! $articles->render() !!}