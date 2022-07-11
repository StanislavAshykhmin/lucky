@extends('layouts.app-admin')
@section('content')
    <div class="header">
        <h1 class="header-title">
            User {{$user->name}}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User games</h5>
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>VALUE</th>
                            <th>WIN</th>
                            <th>PRIZE</th>
                            <th>DATE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->games as $game)
                            <tr>
                                <td>{{$game->id}}</td>
                                <td>{{$game->value}}</td>
                                <td>{!! $game->is_active_html !!}</td>
                                <td>${{$game->prize}}</td>
                                <td data-order="{{$user->created_at_timestamp}}">{{$game->created_at_format}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm my-2">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th>STATUS</th>
                            <td>{!! $user->is_active_html !!}</td>
                        </tr>
                        <tr>
                            <th>EXPIRED AT</th>
                            <td>{{$user->expired_access_format}}</td>
                        </tr>
                        <tr>
                            <th>CREATED AT</th>
                            <td>{{ $user->created_at_format}}</td>
                        </tr>
                        <tr>
                            <th>ACTIONS</th>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Default button group">
                                    <a class="btn btn-info"
                                       href="{{route('admin.users.show', ['user' => $user])}}"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-secondary"
                                       href="{{route('admin.users.edit', ['user' => $user])}}"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button class="btn btn-danger js-delete-record"
                                            data-url="{{route('admin.users.destroy', ['user' => $user])}}"
                                    >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#datatables").DataTable({
        });
    </script>
@endpush
