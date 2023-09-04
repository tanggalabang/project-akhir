@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit New Assign Subject</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <!-- form start -->

                                <div class="row">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Teacher Name</label>
                                            <select name="teacher_id" required class="form-control">
                                                <option value="">Select Teacher</option>
                                                @foreach ($getTeacher as $teacher)
                                                    <option {{ $getRecord->id == $teacher->id ? 'selected' : '' }}
                                                        value="{{ $teacher->id }}">{{ $teacher->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            @foreach ($getClass as $class)
                                                @php
                                                    $checked = '';
                                                @endphp
                                                @foreach ($getAssignClassId as $classAssign)
                                                    @if ($classAssign->class_id == $class->id)
                                                        @php
                                                            $checked = 'checked';
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                <div>
                                                    <input {{ $checked }} type="checkbox" value="{{ $class->id }}"
                                                        name="class_id[]">
                                                    {{ $class->name }}
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <!-- form start -->

                                <div class="row">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Teacher Name</label>
                                            <select name="teacher_id" required class="form-control">
                                                <option value="">Select Teacher</option>
                                                @foreach ($getTeacher as $teacher)
                                                    <option {{ $getRecord->id == $teacher->id ? 'selected' : '' }}
                                                        value="{{ $teacher->id }}">{{ $teacher->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            @foreach ($getSubject as $subject)
                                                @php
                                                    $checked = '';
                                                @endphp
                                                @foreach ($getAssignSubjectId as $subjectAssign)
                                                    @if ($subjectAssign->subject_id == $subject->id)
                                                        @php
                                                            $checked = 'checked';
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                <div>
                                                    <input {{ $checked }} type="checkbox" value="{{ $subject->id }}"
                                                        name="subject_id[]">
                                                    {{ $subject->name }}
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
