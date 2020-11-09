@extends('layouts.admin.index')

@section('content')

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
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
        <div class="col-11"></div>
        <div class="col-1">
            <button type="submit" class="btn btn-success">
                {{ __('messages.admin.postManagementPage.buttonSave') }}
            </button>
        </div>
    </div>
    <div class="row">
        <div class="container mt-3">
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#title">Title</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#description">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#content">Content</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="title" class="container tab-pane active"><br>
                    <div class="row">
                        <div class="col-3">
                            <label for="category">
                                <strong>{{ __('messages.admin.postManagementPage.modifyPage.fieldCategory') }}</strong>
                            </label>
                            <select class="browser-default custom-select" id="category" name="category" required>
                                @foreach($categories as $category)
                                    @if($category->id === $post->category_id)
                                        <option selected>{{ $category->title }}</option>
                                    @else
                                        <option>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <small class="form-text text-muted text-danger">
                                <p class="text-danger">{{ __('messages.admin.postManagementPage.modifyPage.fieldRequired') }}</p>
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="publish">
                                <strong>{{ __('messages.admin.postManagementPage.modifyPage.fieldIsPublished') }}</strong>
                            </label>
                            <select class="browser-default custom-select" id="publish" name="publish" required>
                                <option selected>{{ $post->is_published }}</option>
                                <option> {{ $post->is_published === 1 ? 0 : 1 }}</option>
                            </select>
                            <small class="form-text text-muted text-danger">
                                <p class="text-danger">{{ __('messages.admin.postManagementPage.modifyPage.fieldRequired') }}</p>
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label for="title">
                                <strong>{{ __('messages.admin.postManagementPage.modifyPage.fieldTitle') }}</strong>
                            </label>
                        </div>
                        <div class="col-12">
 				            <textarea class="form-control noresize" id="title" name ="title" maxlength="255" rows="2" required>
					            {{ $post->title }}
                            </textarea>
                            <small class="form-text text-muted text-danger">
                                <p class="text-danger">{{ __('messages.admin.postManagementPage.modifyPage.fieldRequired') }}</p>
				            </small>
                        </div>
                    </div>
                </div>
                <div id="description" class="container tab-pane fade"><br>
                    <div class="row">
                        <div class="col-12">
				            <textarea class="form-control noresize tinymce" id="description" name = "description" rows="3" required>
					            {{ $post->excerpt }}
				            </textarea>
                            <small class="form-text text-muted text-danger">
                                <p class="text-danger">{{ __('messages.admin.postManagementPage.modifyPage.fieldRequired') }}</p>
                            </small>
                        </div>
                    </div>
                </div>
                <div id="content" class="container tab-pane fade"><br>
                    <div class="row">
                        <div class="col-12">
                            <textarea id="postContent" class="tinymce" name="content" required>
                                {{ $post->content_html }}
                            </textarea>
                            <small class="form-text text-muted text-danger">
                                <p class="text-danger">{{ __('messages.admin.postManagementPage.modifyPage.fieldRequired') }}</p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
