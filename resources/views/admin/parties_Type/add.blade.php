@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Parties Type
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Parties Type</h3>
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


                        <form class="form-horizontal" method="post" action="{{ route('admin.parties_Type.add') }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Add Parties Type Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" name="name"
                                            placeholder="Enter parties type Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="{{ route('admin.parties_Type.list') }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
