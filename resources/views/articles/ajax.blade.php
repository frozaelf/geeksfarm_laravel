@extends("layouts.application")

@section("content")

<h1>article page</h1>
<div>
	{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}
</div>
<div id="list-article">
	@include('articles.list')
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.article_ajax_link').click(function(e) {
			$.ajax({
				url : '/articles/ajax',
				type : "GET",
				dataType : "json",
				success : function(data) {
					//$('.panel-body').html(data);
					alert(data);
				},
				error : function(xhr, status) {
					console.log(xhr.error);
				}
			});
		});
	}); 
</script>

@stop

