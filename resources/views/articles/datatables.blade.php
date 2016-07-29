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
		{!! Form::open(['url' => 'articles/getImportExcel', 'files'=>true, 'class' => 'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('image', 'Choose an image', array('class' => 'col-lg-3 control-label')) !!}
			<div class="col-lg-9">
				{!! Form::file('import_file', array('class' => 'form-control')) !!}
				<input readonly="" class="form-control" placeholder="Browse...." type="text">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				{!! Form::submit('Save', array('class' => 'btn btn-inverse btn-raised')) !!}
			</div>
			<div class="clear"></div>
		</div>
		{!! Form::close() !!}
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