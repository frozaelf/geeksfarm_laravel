@extends("layouts.application")

@section("content")

<script>
	$(document).ready(function() {
		$('#captions').masonry({
			itemSelector : '.item-masonry',
			columnWidth : '.item-masonry'
		});
	}); 
</script>
<div id="captions">

	@foreach ($articles as $article)

	<div class="item-masonry col-md-3" data-src="{{ asset('storage/'.$article->image) }}" data-sub-html="<h4>{{$article->title}}</h4><p>{{$article->content}}</p>">
		<div class="thumbnail">
			<a  href=""> <img src="{{ asset('storage/'.$article->image) }}" class="img-responsive"/> </a>
		</div>
	</div>

	@endforeach

</div>

<script>
	$(function() {
		$('#captions').lightGallery({
			thumbnail : true
		});
	});

</script>

@stop