@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add GST Bills
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add GST Bills</h3>
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


                        <form class="form-horizontal" method="post" action="{{ route('admin.GST_Bills.add') }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Add Parties Type Name <span
                                            style="color:red">*</span></label>



                                    <div class="col-sm-3">
                                        <select name="parties_types_id" class="form-control" id=""
                                            placeholder="Enter parties type Name" required>
                                            <option value="">Select the parties types</option>

                                            @foreach ($getpartiesType as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Invoice Date <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="" name="invoice_date"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Invoice No <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="" name="invoice_no"
                                            placeholder="Enter invoice number" required>
                                    </div>

                                    <label for="" class="col-sm-2 control-label">Item Descriptions <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">

                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                            placeholder="enter item descriptions" required></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="box-body">
                                <div class="form-group  mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Total Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="total_amount"
                                            placeholder="total amount" required>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">CGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="cgst_rate"
                                            placeholder="CGST Rate" required>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">SGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="sgst_rate"
                                            placeholder="SGST Rate" required>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">IGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="igst_rate"
                                            placeholder="IGST Rate" required>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">CGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="cgst_amount"
                                            placeholder="CGST Amount" required>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">SGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="sgst_amount"
                                            placeholder="SGST Amount" required>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">IGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="igst_amount"
                                            placeholder="IGST Amount" required>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Tax Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="tax_amount"
                                            placeholder="Tax Amount" required>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Net Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="" name="net_amount"
                                            placeholder="Net Amount" required>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Declaration<span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">

                                        <textarea class="form-control" id="" rows="3" name="declaration" placeholder="Declaration" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="{{ route('admin.GST_Bills.list') }}" class="btn btn-default">Cancel</a>
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
