@extends('layouts.app')
@section('content')
    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    

        <form action="{{route('password.update')}}" method="post">
          @csrf
            
          <input type="hidden" name="token" value="{{ old('token',$token) }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
              
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                </div>
            </div>
        </form>

        

    </div>
@endsection
