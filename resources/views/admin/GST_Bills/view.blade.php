@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                View GST Bills
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">View GST Bills</h3>
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


                        <form class="form-horizontal" >
                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label"> ID <span
                                            style="color:red">*</span></label>



                                    <div class="col-sm-3">
                                       {{$getrecords->id}}
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Add Parties Type Name <span
                                            style="color:red">*</span></label>



                                    <div class="col-sm-3">
                                        {{ !empty($getrecords ->get_parties_types_name->name) ? $getrecords ->get_parties_types_name->name : ""}}
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Invoice Date <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->invoice_date}}
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Invoice No <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->invoice_no}}
                                      
                                    </div>

                                    <label for="" class="col-sm-2 control-label">Item Descriptions <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">

                                        {{$getrecords->description}}
                                        
                                    </div>
                                </div>
                            </div>



                            <div class="box-body">
                                <div class="form-group  mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Total Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->total_amount}}
                                       
                                    </div>
                                    <label for="" class="col-sm-2 control-label">CGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->cgst_rate}}
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">SGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->sgst_rate}}
                                   
                                    </div>
                                    <label for="" class="col-sm-2 control-label">IGST Rate <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->igst_rate}}
                                     
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">CGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->cgst_amount}}
                                    
                                    </div>
                                    <label for="" class="col-sm-2 control-label">SGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->sgst_amount}}
                                     
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">IGST Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->igst_amount}}
                                      
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Tax Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->tax_amount}}
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Net Amount <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->net_amount}}
                                     
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Declaration<span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->declaration}}

                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group mb-3 col-6 md-4">
                                    <label for="" class="col-sm-2 control-label">Created At <span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->created_at}}
                                     
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Updated At<span
                                            style="color:red">*</span></label>

                                    <div class="col-sm-3">
                                        {{$getrecords->updated_at}}

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="{{ route('admin.GST_Bills.list') }}" class="btn btn-default">Back</a>
                            </div>
                    </div>
                    </form>
                </div>

            </div>
    </div>
    </section>
    </div>
@endsection
