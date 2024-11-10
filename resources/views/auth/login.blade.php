@extends('layouts.app')
@section('content')
    <div class="login-box-body">
  @include('_message')
        <form action="{{route('login_post')}}" method="post">
          @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in
                using
                Google+</a>
        </div>

        <a href="{{ route('password.request') }}">I forgot my password</a><br>
        <a href="{{ route('auth.register') }}" class="text-center">Register a new membership</a>

    </div>
@endsection
