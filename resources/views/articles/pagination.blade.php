@extends("layouts.application")

@section("content")

<div class="panel panel-inverse">
	<div class="panel-heading">
		<h5>Ajax Pagination</h5>
	</div>
	<div class="panel-body">
		<div id="articles-list">
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
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(document).on('click', '.pagination a', function(e) {
			get_page($(this).attr('href').split('page=')[1]);
			e.preventDefault();
		});
	});

	function get_page(page) {
		$.ajax({
			url : '/articles/pagination?page=' + page,
			type : 'GET',
			dataType : 'json',
			success : function(data) {
				$('#articles-list').html(data['view']);
			},
			error : function(xhr, status, error) {
				console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
			},
			complete : function() {
				alreadyloading = false;
			}
		});
	}
</script>

@stop