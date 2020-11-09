@extends('layouts.admin.index') 

@section('content')

<form action="{{ route('admin.categories.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
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
	
	<div class="container-fluid">
		<div class="row">
		    <div class="col-12">
		      	<button type="submit" class="btn btn-success">
	      			{{ __('messages.admin.categoryManagementPage.buttonSave') }}
	      		</button>
		    </div>
		</div>
		<div class="row">
			<div class="col-10">
				<div class="form-group">
					<label for="title">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldTitle') }}</label>
					<input class="form-control" id="title" name="title" required="">
			    	<small class="form-text text-muted text-danger">
			    		<p class="text-danger">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldRequired') }}</p>
			    	</small>
				</div>
				<div class="form-group">
				    <label for="description">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldDescr') }}</label>
				    <input class="form-control" id="description" name="description" required>
			    	<small class="form-text text-muted text-danger">
			    		<p class="text-danger">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldRequired') }}</p>
			    	</small>
				</div>	      
			</div>
		</div>
	</div>
</form> 
@endsection