@extends('layouts.nonadmin.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">User Profile</div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Name:</strong> {{ $user->name }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong> {{ $user->email }}
                </div>

                <div class="mb-3">
                    <strong>Password:</strong> {{ $user->password }}
                </div>

                <div class="mb-3">
                    <strong>Role:</strong> {{ $user->role }}
                </div>
            </div>
            <div class="card-header"><a href="#" class="btn btn-primary">Edit Profile</a></div>
        </div>
    </div>
</div>

@endsection
