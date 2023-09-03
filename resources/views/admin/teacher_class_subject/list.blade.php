@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add New Teacher</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Teacher</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                                name="name" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('last_name') }}" name="last_name"
                                                placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ Request::get('email') }}"
                                                name="email" placeholder="email">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option {{ Request::get('gender') == 'Male' ? 'selected' : '' }}
                                                    value="Male">Male</option>
                                                <option {{ Request::get('gender') == 'Female' ? 'selected' : '' }}
                                                    value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Marital Status</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('marital_status') }}" name="marital_status"
                                                placeholder="Marital Status">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Current Address</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('address') }}" name="address"
                                                placeholder="Current Address">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('mobile_number') }}" name="mobile_number"
                                                placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option {{ Request::get('status') == 100 ? 'selected' : '' }}
                                                    value="0">Active</option>
                                                <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date of Joining</label>
                                            <input type="date" class="form-control"
                                                value="{{ Request::get('admission_date') }}" name="admission_date">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Created Date</label>
                                            <input type="date" class="form-control" value="{{ Request::get('date') }}"
                                                name="date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">search</button>
                                            <a href="{{ url('admin/teacher/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">reset</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                            </form>
                        </div> --}}
                        <!-- /.card -->

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Profile Pic</th>
                                            <th>Teacher Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Joining</th>
                                            <th>Mobile Number</th>
                                            <th>Marital Status</th>
                                            <th>Current Address</th>
                                            <th>Permanent Address</th>
                                            <th>Qualification</th>
                                            <th>Work Experience</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Created Date</th> --}}
                                            <th>Teacher Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                {{-- <td>
                                                    @if (!empty($value->getProfile()))
                                                        <img src="{{ $value->getProfile() }}"
                                                            style="width: 50px; height: 50px; border-radius: 50px;">
                                                    @endif
                                                </td>
                                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>
                                                    @if (!empty($value->date_of_birth))
                                                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($value->admission_date))
                                                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $value->mobile_number }}</td>
                                                <td>{{ $value->marital_status}}</td>
                                                <td>{{ $value->address}}</td>
                                                <td>{{ $value->permanent_address}}</td>
                                                <td>{{ $value->qualification}}</td>
                                                <td>{{ $value->work_experience}}</td>
                                                <td>{{ $value->note}}</td>
                                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y H:i A'), strtotime($value->created_at) }}</td> --}}
                                                <td>{{ $value->email }}</td>
                                                <td style="min-width: 150px;">
                                                    <a href="{{ url('admin/teacher_class_subject/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
