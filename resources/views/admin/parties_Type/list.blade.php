@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Parties Type</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12 mb-4">
                    @include('_message')

                    <form action="" method="get" class="mb-5">
                        <div class="card body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control" value="{{Request()->id}}"
                                        placeholder="Search parties types ID">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Parties Types Name</label>
                                    <input type="text" name="name" class="form-control" value="{{Request()->name}}"
                                        placeholder="Search parties types name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Created Date</label>
                                    <input type="date" name="created_at" class="form-control" value="{{Request()->create_at}}"
                                        >
                                </div><div class="form-group col-md-3">
                                    <label for="">Updated Date</label>
                                    <input type="date" name="updated_at" class="form-control" value="{{Request()->created_at}}"
                                        >
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ route('admin.parties_Type.list') }}" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="box mt-5">
                        <div class="box-header with-border">
                            <h3 class="box-title">Parties Type List</h3>
                            <a href="{{ route('admin.parties_Type.add') }}" class="btn btn-primary pull-right mr-2">Add New
                                Parties Type</a>
                                <a href="{{route('admin.parties_Type.pdf_generator')}}" class="btn btn-success pull-right ">PDF Generator</a>
                        </div>
                        

                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Parties Type</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>

                                    <th>Actions</th>
                                </tr>
                                @forelse ($getRecords as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                        <td>{{ date('d-m-Y',strtotime($value->updated_at ))}}</td>

                                        <td>
                                            <a href="{{ route('admin.parties_Type.edit', ['id' => $value->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('admin.parties_Type.delete', ['id' => $value->id]) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No records found</td>
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
