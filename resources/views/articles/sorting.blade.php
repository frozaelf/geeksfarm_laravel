@extends("layouts.application")

@section("content")

<div class="panel panel-inverse">
	<div class="panel-heading">
		<h5>Ajax Searching</h5>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12" id="enrolls-list">
				<div id="articles-list">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>
								<th class="text-center">Title</th>
								<th class="text-center">Content</th>
							</tr>
						</thead>
						<tbody>
							@foreach($articles as $article)
							<tr>
								<td>{!! $article->id !!}</td>
								<td class="text-center">{!! $article->title !!}</td>
								<td>{!! $article->content !!} </td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div>
						{!! $articles->render() !!}
						<div></div>
					</div>
					<input id="direction" type="hidden" value="asc" />
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(document).on('click', '#id', function(e) {
			sort_articles();
			e.preventDefault();
		});
	});

	function sort_articles() {
			$.ajax({
				url : '/articles/sorting',
				typs : 'GET',
				dataType : 'json',
				data : {
					"direction" : $('#direction').val()
				},

				success : function(data) {
					$('#articles-list').html(data['view']);
					$('#direction').val(data['direction']);
					if (data['direction'] == 'asc') {
						$('i#ic-direction').attr({
							class : "fa fa-arrow-up"
						});
					} else {
						$('i#ic-direction').attr({
							class : "fa fa-arrow-down"
						});
					}
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
