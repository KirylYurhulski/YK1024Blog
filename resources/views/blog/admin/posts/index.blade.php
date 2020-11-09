@extends('layouts.admin.index')

@section('content')
	@if($errors->any())
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
  					{{ $errors->first() }}
				</div>
			</div>
		</div>
	@endif

	@if(Session::has('success'))
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="alert alert alert-success" role="alert">
  					{{ Session::get('success') }}
				</div>
			</div>
		</div>
	@endif

<a href="{{ route('admin.posts.create') }}"><h6>{{ __('messages.admin.postManagementPage.new') }}</h6></a>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>{{ __('messages.admin.postManagementPage.listTitle.id') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.categoryTitle') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.author') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.title') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.publishedAt') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.createdAt') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.updatedAt') }}</th>
				<th>{{ __('messages.admin.postManagementPage.listTitle.deletedAt') }}</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->id }}</a></td>
                    <td>{{ $post->category_id }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>{{ $post->deleted_at }}</td>
                    <td>
                        @if (empty($post->deleted_at))
                            <form class="formDelete" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('messages.admin.categoryManagementPage.buttonDelete') }}
                                </button>
                            </form>
                        @else
                            <form class="formRecover" method="POST" action="{{ route('admin.posts.restore', $post->id) }}">
                                <input type="hidden" name="_method" value="PATCH" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-success">
                                    {{ __('messages.admin.categoryManagementPage.buttonRecover') }}
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
			@endforeach
		</tbody>
	</table>

	{{ $posts->links() }}
</div>
@endsection
