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
        <div class="auth-wrapper auth-v1">
            <div class="auth-inner">
                <!-- Register v1 -->
                <div class="card mb-0">
                    <div class="card-body">
                        <h1>
                            Sign up
                        </h1>
                        <h4 class="card-title mb-1">Try your luck now 🚀</h4>
                        <p class="card-text mb-2">Quick registration!</p>

                        <form class="auth-register-form mt-2" action="{{route('register')}}" method="POST">
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
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}" placeholder="380991234567" aria-describedby="phone" tabindex="2" />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                        </form>

                        <p class="text-center mt-2">
                            <span>Already have an account?</span>
                            <a href="{{route('login')}}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register v1 -->
            </div>
        </div>

    </div>
@endsection
