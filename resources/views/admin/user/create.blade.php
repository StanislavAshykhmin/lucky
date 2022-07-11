@extends('layouts.app-admin')
@section('content')
    <div class="header">
        <h1 class="header-title">
            User create
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{route('admin.users.index')}}">Users</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    User create
                </li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center">
        <div class="col-xxl-4">
            <div class="card mx-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        User create form
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="johndoe" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            <input class="form-control form-control-lg @error('phone') is-invalid @enderror" type="number" value="{{ old('phone') }}" name="phone" placeholder="380991234567" />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
