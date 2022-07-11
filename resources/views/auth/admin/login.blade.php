@extends('layouts.app-admin')

@section('content')
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-title">
                            <div class="text-center mt-4">
                                <h1 class="h2">Welcome back, Admin</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form method="POST" action="{{ route('admin.login.get') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
