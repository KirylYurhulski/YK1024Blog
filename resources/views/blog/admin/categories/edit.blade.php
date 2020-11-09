@extends('layouts.admin.index')

@section('content')

@php
	/** var \App\Models\BlogCategory $category*/
@endphp

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
	<input type="hidden" name="_method" value="PATCH" />
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
				    <input class="form-control" id="title" name="title" value="{{ $category->title }}" readonly>
			    	<small class="form-text text-muted text-danger">
			    		<p class="text-danger">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldRequired') }}</p>
			    	</small>
			  	</div>
			  	<div class="form-group">
			    	<label for="description">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldDescr') }}</label>
			    	<input class="form-control" id="description" name="description" value="{{ $category->description }}" required>
			    	<small class="form-text text-muted text-danger">
			    		<p class="text-danger">{{ __('messages.admin.categoryManagementPage.modifyPage.fieldRequired') }}</p>
			    	</small>
			  	</div>
		    </div>
		    <div class="col">
			  	<div class="form-group">
			    	<label for="create_at">
			    		{{ __('messages.admin.categoryManagementPage.modifyPage.fieldCreatedAt') }}
			    	</label>
			    	<input types="datetime" class="form-control" id="created_at" name="created_at" value="{{ $category->created_at }}" readonly>
			  	</div>
			 	<div class="form-group">
			    	<label for="updated_at">
			    		{{ __('messages.admin.categoryManagementPage.modifyPage.fieldUpdatedAt') }}
			    	</label>
			    	<input types="datetime"class="form-control" id="updated_at" name="updated_at" value="{{ $category->updated_at }}" readonly>
			  	</div>
				<div class="form-group">
			    	<label for="deleted_at">
			    		{{ __('messages.admin.categoryManagementPage.modifyPage.fieldDeletedAt') }}
			    	</label>
			    	<input types="datetime"class="form-control" id="deleted_at" name="deleted_at" value="{{ $category->deleted_at }}"readonly>
			  	</div>
		    </div>
		</div>
</form>
@endsection
