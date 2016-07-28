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

</div>
<input id="direction" type="hidden" value="asc" />
