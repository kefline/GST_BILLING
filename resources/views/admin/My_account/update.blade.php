@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                My Account
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">My Account updates</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            @include('_message')
                        <form class="form-horizontal" method="post" action="{{ route('admin.My_account.update') }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"> Name <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="name" value="{{$getRecord->name}}"
                                            placeholder=" Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"> Phone <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="tel" class="form-control" id="" name="phone" value="{{$getRecord->phone}}"
                                            placeholder=" phone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"> Email <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="" name="email" value="{{$getRecord->email}}"
                                            placeholder=" email" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"> Password</label>

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="" name="password"
                                            placeholder=" password" required>
                                        (leave if you do not need the change the password)
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Confirm Password</label>

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="" name="password_confirmation"
                                            placeholder=" confirm  password" required>
                                        (leave if you do not need the change the password)
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="{{ route('admin.parties_Type.list') }}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
