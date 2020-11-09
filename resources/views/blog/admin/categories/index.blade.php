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

<a href="{{ route('admin.categories.create') }}"><h6>{{ __('messages.admin.categoryManagementPage.new') }}</h6></a>
<div class="table-responsive">

	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.id') }}</th>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.title') }}</th>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.descr') }}</th>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.createdAt') }}</th>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.updatedAt') }}</th>
				<th>{{ __('messages.admin.categoryManagementPage.listTitle.deletedAt') }}</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->id }}</a></td>
				<td>{{ $category->title }}</td>
				<td>{{ $category->description }}</td>
				<td>{{ $category->created_at }}</td>
				<td>{{ $category->updated_at }}</td>
				<td>{{ $category->deleted_at }}</td>
				<td>
                     @if (empty($category->deleted_at))
                        <form class="formDelete" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
							<input type="hidden" name="_method" value="DELETE" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">
                                {{ __('messages.admin.categoryManagementPage.buttonDelete') }}
                            </button>
                        </form>
                    @else
                        <form class="formRecover" method="POST" action="{{ route('admin.categories.restore', $category->id) }}">
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

	{{ $categories->links() }}
</div>
@endsection
