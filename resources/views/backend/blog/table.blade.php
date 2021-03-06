<table class="table table-bordered" id="table-post">
	<thead>
		<tr>
			<td width="80">Action</td>
			<td>Title</td>
			<td width="120">Author</td>
			<td width="150">Category</td>
			<td width="170">Date Created</td>
		</tr>
	</thead>
<!-- 	<tbody>
		<?php $request = request(); ?>
		@foreach($posts as $post)
			<tr>
				<td>
      			{!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
      				@if (check_user_permissions($request, "Blog@edit", $post->id))
        					<a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
        						<i class="fa fa-edit"></i>
        					</a>
    					@else
        					<a href="#" class="btn btn-xs btn-default disabled">
        						<i class="fa fa-edit"></i>
        					</a>
    					@endif
    					@if (check_user_permissions($request, "Blog@destroy", $post->id))
        					<button type="submit" class="btn btn-xs btn-danger">
        						<i class="fa fa-trash"></i>
        					</button>
        				@else
        					<button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
        						<i class="fa fa-trash"></i>
        					</button>
        				@endif
      			{!! Form::close() !!}
				</td>
				<td>{{ $post->title }}</td>
				<td>{{ $post->author->name }}</td>
				<td>{{ $post->category->title }}</td>
				<td>
					<abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
					{!! $post->publicationLabel() !!}
				</td>
			</tr>
		@endforeach
	</tbody> -->
	</table>
	@section('script')
	$('ul.pagination').addClass('no-margin pagination-sm');

	$(function() {
        $('#table-post').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('data.post') !!}',
            columns: [
                {data: 'action', name: 'action'},
                {data: 'title', name: 'title'},
                {data: 'author', name: 'author'},
                {data: 'category', name: 'category'},
                {data: 'date', name: 'date'},
            ],
        });
    });
@endsection