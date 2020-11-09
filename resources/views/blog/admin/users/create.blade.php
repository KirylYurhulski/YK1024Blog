@extends('layouts.admin.index') 

@section('content')

<form action="{{ route('admin.users.store') }}" method="POST">
	{{ csrf_field() }}

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
	
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
				<div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @if(!empty($message))
    					@error('name')
                            <span class="invalid-feedback" role="alert">
                                @if(!empty($message))
                                    <strong>{{ $message }}</strong>
                                @endif
                            </span>
                        @enderror
                    @endif
                </div>
            </div>
			<div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
				<div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @if(!empty($message))
    					@error('email')
                            <span class="invalid-feedback" role="alert">
                                @if(!empty($message))
                                    <strong>{{ $message }}</strong>
                                @endif
                             </span>
                        @enderror
                    @endif
                </div>
            </div>
			 <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
				<div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @if(!empty($message))
    					@error('password')
                            <span class="invalid-feedback" role="alert">
                                @if(!empty($message))
                                    <strong>{{ $message }}</strong>
                                @endif
                            </span>
                         @enderror
                    @endif
                </div>
            </div>
			<div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
				<div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
			<div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>
</form> 
@endsection