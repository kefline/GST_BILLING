@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Parties
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
                                        placeholder="Search parties types ID">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Name</label>
                                    <input type="text" name="full_name" class="form-control" value="{{Request()->full_name}}"
                                        placeholder="Search Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{Request()->phone}}"
                                        placeholder="Search phone">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Created Date</label>
                                    <input type="date" name="created_at" class="form-control" value="{{Request()->created_at}}"
                                       >
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ route('admin.parties.list') }}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Parties list</h3>
                            <a href="{{ route('admin.parties.add') }}" class="btn btn-primary pull-right">Add new parties
                            </a>

                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Parties Type Name </th>
                                    <th>Name </th>
                                    <th>Phone </th>
                                    <th>Address </th>
                                    <th>Account_no </th>
                                    <th>Bank_name </th>
                                    <th>IFSC </th>
                                    <th>Branch_Address </th>
                                    <th>Account_holder_name </th>
                                    <th> Created Date</th>
                                    <th>Actions</th>
                                </tr>
                                @forelse ($getRecords as $value)
                                    <tr>

                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->full_name }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->account_no }}</td>
                                        <td>{{ $value->bank_name }}</td>
                                        <td>{{ $value->ifsc }}</td>
                                        <td>{{ $value->branch_address }}</td>
                                        <td>{{ $value->account_holder_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>



                                        <td>
                                            <a href="{{ route('admin.parties.edit', ['id' => $value->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('admin.parties.delete', ['id' => $value->id]) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>no records found</td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </ul>
                        </div>

                    </div>


                </div>

            </div>

        </section>
    </div>
@endsection
