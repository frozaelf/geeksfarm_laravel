@extends("layouts.application")

@section("content")

  <h1>article page</h1>

  <div>{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}</div>

  <div id="list-article" class="panel-body">

    @include('articles.list')

  </div>

@stop

