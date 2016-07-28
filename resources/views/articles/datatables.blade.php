@extends("layouts.application")
@section('content')
<div class="panel panel-inverse">
	<div class="panel-heading">
		Table Article
	</div>
	<div class="panel-body">
		<div>
			{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success btn-sm btn-raised')) !!}
		</div>
		<table class="table table-bordered" id="article-table">
			<thead>
				<tr>
					<th class="check">
					<input type="checkbox" id="flowcheckall" value="">
					</th>
					<th>Image</th>
					<th>Title</th>
					<th>Content</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<script>
	$(function() {
		$('#article-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{!! route('datatables.data') !!}',
		"order": [[ 2, "desc" ]],
		columns:[{
			data : 'id',
			name : 'id'
		}, {
			data : 'image',
			name : 'image'
		}, {
			data : 'title',
			name : 'title'
		}, {
			data : 'content',
			name : 'content'
		}, {
			data : 'action',
			name : 'action',
			orderable : false,
			searchable : false
		}]
	});
	});

</script>
@stop