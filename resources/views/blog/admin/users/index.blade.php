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

<a href="{{ route('admin.users.create') }}"><h6>{{ __('messages.admin.userManagementPage.new') }}</h6></a>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>{{ __('messages.admin.userManagementPage.listTitle.id') }}</th>
				<th>{{ __('messages.admin.userManagementPage.listTitle.name') }}</th>
				<th>{{ __('messages.admin.userManagementPage.listTitle.email') }}</th>
				<th>{{ __('messages.admin.userManagementPage.listTitle.createdAt') }}</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</a></td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at }}</td>
				<td>
    				<form class="formDelete" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
						<input type="hidden" name="_method" value="DELETE" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger">
                        	{{ __('messages.admin.userManagementPage.buttonDelete') }}
						</button>
                    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    {{ $users->links() }}
</div>
@endsection
