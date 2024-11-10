@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                GST Bills
            </h1>

        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12 mb-4">
                    @include('_message')
                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control" value="{{Request()->id}}"
                                        placeholder="Search GST Bills">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Parties type Name</label>
                                    <input type="text" name="name" class="form-control" value="{{Request()->name}}"
                                        placeholder="Search parties types name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Invoice Date</label>
                                    <input type="date" name="invoice_date" class="form-control" value="{{Request()->invoice_date}}"
                                        placeholder="Search invoice date">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Invoice number</label>
                                    <input type="text" name="invoice_no" class="form-control" value="{{Request()->invoice_no}}"
                                        placeholder="Search invoice number">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Total amount</label>
                                    <input type="number" name="total_amount" class="form-control" value="{{Request()->Total_amount}}"
                                        placeholder="Search total number">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ route('admin.GST_Bills.list') }}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">GST Bills list</h3>
                            <a href="{{ route('admin.GST_Bills.add') }}" class="btn btn-primary pull-right"> Add GST new Bills
                                list</a>

                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Parties type</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice No</th>
                                    <th>Total Amount</th>
                                    <th>Tax Amount</th>
                                    <th>Net Amount</th>



                                    <th>Actions</th>
                                </tr>
                                @php
                                    $totalAmount = 0;
                                @endphp
                                @foreach ($getRecords as $value)
                                    @php
                                        $totalAmount = $totalAmount + $value->total_amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ date('d-m-Y',strtotime($value->invoice_date ))}}</td>
                                        <td>{{ $value->invoice_no }}</td>
                                        <td>Tsh.{{ $value->total_amount }}</td>

                                        <td>{{ $value->tax_amount }}</td>
                                        <td>{{ $value->net_amount }}</td>
                                        <td>
                                            <a href="{{ route('admin.GST_Bills.view', ['id' => $value->id]) }}"
                                                class="btn btn-info">view</a>
                                            <a href="{{ route('admin.GST_Bills.edit', ['id' => $value->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('admin.GST_Bills.delete', ['id' => $value->id]) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach
                                @if (!empty($totalAmount))
                                    <tr>
                                        <th colspan="4"> Total(Tsh.) </th>
                                        <td>Tsh.{{ number_format($totalAmount) }}</td>
                                        <td colspan="6"></td>
                                    </tr>
                                @endif


                            </table>
                        </div>

                    </div>

                </div>


            </div>

    </div>

    </section>
    </div>
@endsection
