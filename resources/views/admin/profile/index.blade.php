@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
<div class="container">
    <br><br>
    <div class="row justify-content-center align-items-center">
        <form action="{{ route('profile.update',auth()->id()) }}" method="POST" class="col-md-4" >
           @csrf @method('PUT')

            <img src="{{ handleNullImage(auth()->user()->avatar) }}" class="img-fluid rounded-circle d-block mx-auto" width='120' alt="">
            <br>

            @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-2">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}"  readonly>
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ auth()->user()->email }}"  readonly>
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Change Password</label>
                <input type="password" class="form-control"" name="password" placeholder="•••••••••" >
            </div>
            <input type="file" name="avatar" id="user_image" >
            <button class="btn btn-crimson form-control">Submit <i class="fas fa-paper-plane ml-1"></i> </button>
    </div>
</div>
{{--End CONTAINER--}}
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection