@extends("layouts.application")

@section("content")

<div class="panel panel-inverse">
	<div class="panel-heading">
		<h5>Edit Article<h5>
	</div>
	<div class="panel-body">
		{!! Form::model($article, ['route' => array('articles.update', $article->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form', 'files'=>'true']) !!}
		@if ($article->image != "")
		<div class="form-group">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				{!! Html::image(URL::asset('storage/'.$article->image), '',['class' => 'img-responsive','style' => 'max-width:100px']) !!}
			</div>
		</div>
			@endif
		<div class="form-group">
			{!! Form::label('image', 'Choose an image', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::file('image', array('class' => 'form-control')) !!}
				<input readonly="" class="form-control" placeholder="Browse...." type="text">
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
				{!! $errors->first('title') !!}
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-group">
			{!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!}
				{!! $errors->first('content') !!}
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-group">
			{!! Form::label('author', 'Writer', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::text('author', null, array('class' => 'form-control')) !!}
				{!! $errors->first('author') !!}
			</div>
			<div class="clear"></div>
		</div>
		<div class="form-group">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				{!! Form::submit('Save', array('class' => 'btn btn-inverse btn-raised')) !!}
			</div>
			<div class="clear"></div>
		</div>
		{!! Form::close() !!}
	</div>
</div>

@stop