@extends('layouts.app')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Forgot password</p>
        @include('_message')
        <form action="{{ route('password.request') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
           
            <div class="d-flex justify-content-between">
                <a href="{{ route('auth.login') }}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>


    </div>
@endsection
