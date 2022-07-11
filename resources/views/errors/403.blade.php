@extends('layouts.app-user')
@push('styles')
@endpush
@section('content')
    <div class="content-body">
        <!-- Not authorized-->
        <div class="misc-wrapper">
            <div class="misc-inner p-2 p-sm-3">
                <div class="w-100 text-center">
                    <h2 class="mb-1">Your account has been deactivated! 🔐</h2>
                    <p class="mb-2">
                        Your account has been deactivated automatically after seven days of use or by you. To continue using the site, create a new account with a unique phone number.
                    </p>
                </div>
            </div>
        </div>
        <!-- / Not authorized-->
    </div>
@endsection
