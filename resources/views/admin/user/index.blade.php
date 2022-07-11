@extends('layouts.app-admin')
@section('content')
    <div class="header">
        <h1 class="header-title">
            Users
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    Users
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card mx-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Users list
                        <a class="btn btn-success float-end" href="{{route('admin.users.create')}}">Add user</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>STATUS</th>
                            <th>EXPIRED AT</th>
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{!! $user->is_active_html !!}</td>
                                <td>{{$user->expired_access_format}}</td>
                                <td data-order="{{$user->created_at_timestamp}}">{{ $user->created_at_format}}</td>
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
                        @endforeach
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
            "columnDefs": [ {
                "targets": 5,
                "orderable": false
            } ]
        });
    </script>
@endpush
