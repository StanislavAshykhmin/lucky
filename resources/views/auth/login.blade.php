@extends('layouts.app-user')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/pages/page-auth.css')}}">
    <style>
        .app-content{
            padding: 0 !important;
        }
    </style>
@endpush
@section('content')
    <div class="content-body">
        <div class="auth-wrapper auth-v1 px-2">
            <div class="auth-inner py-2">
                <div class="card mb-0">
                    <div class="card-body">
                        <h1>
                            Sign in
                        </h1>
                        <h4 class="card-title mb-1">Welcome to {{config('app.name')}}! 👋</h4>
                        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

                        <form class="auth-login-form mt-2" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="johndoe" aria-describedby="name" tabindex="1" autofocus />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="380991234567" aria-describedby="phone" tabindex="1" autofocus />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} tabindex="3" />
                                    <label class="custom-control-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                        </form>

                        <p class="text-center mt-2">
                            <span>New on our platform?</span>
                            <a href="{{route('register')}}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login v1 -->
            </div>
        </div>

    </div>
@endsection
