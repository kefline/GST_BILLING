@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Parties
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Parties</h3>
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


                        <form class="form-horizontal" method="post" action="{{ route('admin.parties.edit', ['id' => $getRecord->id ]) }}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="mb-3 col-6 md-4">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Parties Type Name<span
                                            style="color: red">*</span></label>

                                            <div class="col-sm-6">
                                                <select name="parties_types_id" id="parties_types" class="form-control">
                                                    <option value="">Select parties name</option>
                                                    @foreach ($getpartiestype as $value)
                                                        <option 
                                                            value="{{ $value->id }}" 
                                                            {{ (isset($getRecord) && $getRecord->parties_types_id == $value->id) ? 'selected' : '' }}
                                                        >
                                                            {{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Name<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="full_name"
                                           value="{{$getRecord->full_name}}" placeholder="Enter parties Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone Number <span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="phone"
                                        value="{{$getRecord->phone}}"  placeholder="Enter phone number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Address<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="address"
                                        value="{{$getRecord->address}}"  placeholder="Enter address " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Bank Name<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="bank_name"
                                        value="{{$getRecord->bank_name}}"  placeholder="Enter Bank name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Account Number<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="account_no"
                                        value="{{$getRecord->account_no}}"  placeholder="Enter account number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Branch Address<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="branch_address"
                                        value="{{$getRecord->branch_address}}" placeholder="Enter branch_address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">IfSC code<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" name="ifsc"
                                        value="{{$getRecord->ifsc}}"  placeholder="Enter ifsc " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Account holder name<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id=""
                                        value="{{$getRecord->account_holder_name}}"  name="account_holder_name" placeholder="Enter account holder name " required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="{{ route('admin.parties.list') }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
