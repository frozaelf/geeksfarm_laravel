@extends("layouts.application")

@section("content")

<div class="panel panel-primary">
	<div class="panel-body">
		<center>
			@if($article->image != "")
			<img class="img-responsive thumb img-thumbnail m-b" src="{{ asset('images/'.$article->image) }}" alt="Saber9">
			@endif
		</center>
		<article>
			<h1>{!! $article->title !!}</h1>
			<p>
				{!! $article->content !!}
			</p>
			<p>
				By {!! $article->author !!}
			</p>
		</article>
	</div>
</div>

<div class="panel panel-inverse">
	<div class="panel-body">
		<h4>Comments</h4>

		@foreach($comments as $comment)

		<div class="row">
			<div class="col-sm-1">
				<div class="thumbnail">
					<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
				</div><!-- /thumbnail -->
			</div><!-- /col-sm-1 -->
			<div class="col-sm-11">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>{!! $comment->user->name !!}</strong><span class="text-muted">commented on {{ $comment->created_at->format('S, M d | h:i:s')}}</span>
					</div>
					<div class="panel-body">
						{!! $comment->content !!}
					</div><!-- /panel-body -->
				</div><!-- /panel panel-default -->
			</div><!-- /col-sm-5 -->
		</div>

		@endforeach

		{!! Form::open(array('url' => 'comments', 'class' => 'form-horizontal', 'role' => 'form')) !!}
		{!! Form::hidden('article_id', $value = $article->id, array('class' => 'form-control')) !!}
		{!! Form::hidden('slug', $value = $article->slug, array('class' => 'form-control')) !!}
		{!! Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) !!}
		<div class="form-group">
			{!! Form::label('content', 'Give Comment', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!}
				{!! $errors->first('content') !!}
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-group">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				{!! Form::submit('Create Comment', array('class' => 'btn btn-success btn-raised')) !!}
			</div>
			<div class="clear"></div>
		</div>
		{!! Form::close() !!}

	</div>
</div>

@stop