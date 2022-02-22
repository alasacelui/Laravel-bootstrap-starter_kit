@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
<div class="container">
    <br><br>
    <div class="row justify-content-center align-items-center">
        <form action="{{ route('profile.update',auth()->id()) }}" method="POST" class="col-md-4" id="profile_form">
           @csrf @method('PUT')

           <img src="{{ handleNullImage(auth()->user()->avatar_profile) }}" class="img-fluid rounded-circle d-block mx-auto" width='120' alt="">
            <br>

            @include('layouts.includes.alert')

            <div class="form-group mb-2">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}"  readonly>
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ auth()->user()->email }}"  readonly>
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Current Password</label>
                <input type="text" class="form-control"" name="old">
            </div>
            <div class="form-group mb-2">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control"" name="password" placeholder="•••••••••" >
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control"" name="password_confirmation" placeholder="•••••••••" >
            </div>
            <input type="file" name="avatar" id="user_image" >
            <button class="btn btn-dark form-control" 
            onclick="event.preventDefault();confirm('Do you want to update profile?', '', 'update').then(res => res.isConfirmed ? $('#profile_form').submit() : false)"
            >Update </button>
    </div>
</div>
{{--End CONTAINER--}}
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection