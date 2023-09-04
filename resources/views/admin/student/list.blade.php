@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                            Tambah Siswa
                        </button>
                    </div>


                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>L/P</th>
                                            <th>No. INDUK SISWA</th>
                                            <th>KELAS</th>
                                            <th>EMAIL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = ($getRecord->currentPage() - 1) * $getRecord->perPage() + 1 @endphp

                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>{{ $value->nis }}</td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td style="min-width: 150px;">
                                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#modal-default{{ $value->id }}">
                                                        Edit
                                                    </button>
                                                    <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
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

    {{-- modal add --}}
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/student/add') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success buttons mb-3 addRow">
                            Tambah baris</a>
                        <table class="table table-striped table-hover" style="width:100%;">
                            <thead id="thead">
                                <tr>
                                    <th>NAMA</th>
                                    <th>L/P</th>
                                    <th>No. INDUK SISWA</th>
                                    <th>KELAS</th>
                                    <th>EMAIL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <tr>
                                    <td>
                                        <div style="margin-bottom: 0 !important" class="form-group">
                                            <input type="text" class="form-control" name="name[]">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin-bottom: 0 !important" class="form-group">
                                            <select class="form-control" name="gender[]">
                                                <option value="">Pilih</option>
                                                <option {{ old('gender') == 'L' ? 'selected' : '' }} value="L">
                                                    L</option>
                                                <option {{ old('gender') == 'P' ? 'selected' : '' }} value="P">
                                                    P</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin-bottom: 0 !important" class="form-group">
                                            <input type="text" class="form-control" name="nis[]">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin-bottom: 0 !important" class="form-group">
                                            <select class="form-control" name="class_id[]">
                                                <option value="">Pilih</option>
                                                @foreach ($getClass as $value)
                                                    <option {{ old('class_id') == $value->id ? 'selected' : '' }}
                                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin-bottom: 0 !important" class="form-group">
                                            <input type="text" class="form-control" name="email[]">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-icon icon-left btn-danger deleteRow">
                                            Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @foreach ($getRecord as $value)
        <div class="modal fade" id="modal-default{{ $value->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin/student/edit/' . $value->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>NAMA</th>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ old('name', $value->name) }}" name="name">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>L/P</th>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <select class="form-control" id="gender" name="gender">
                                                    <option selected>Pilih</option>
                                                    <option {{ old('gender', $value->gender) == 'L' ? 'selected' : '' }}
                                                        value="L">L</option>
                                                    <option {{ old('gender', $value->gender) == 'P' ? 'selected' : '' }}
                                                        value="P">P</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No. INDUK SISWA</th>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ old('nis', $value->nis) }}" name="nis">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>KELAS</th>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <div style="margin-bottom: 0 !important" class="form-group">
                                                    <select class="form-control" name="class_id">
                                                        <option value="">Pilih</option>
                                                        @foreach ($getClass as $result)
                                                            <option
                                                                {{ old('class_id', $value->class_id) == $result->id ? 'selected' : '' }}
                                                                value="{{ $result->id }}">{{ $result->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td>
                                            <div style="margin-bottom: 0 !important" class="form-group">
                                                <input type="text" class="form-control"
                                                    value="{{ old('email', $value->email) }}" name="email">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- /.modal -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('.modal-body').on('click', '.addRow', function() {
            var tr =
                "<tr>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group'>" +
                "<input type='text' class='form-control' name='name[]'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group'>" +
                "<select class='form-control' name='gender[]'>" +
                "<option value=''>Pilih</option>" +
                "<option {{ old('gender') == 'L' ? 'selected' : '' }} value='L'>" +
                "L</option>" +
                "<option {{ old('gender') == 'P' ? 'selected' : '' }} value='P'>" +
                "P</option>" +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group'>" +
                "<input type='text' class='form-control' name='nis[]'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group'>" +
                "<select class='form-control' name='class_id[]'>" +
                "<option value=''>Pilih</option>" +
                "@foreach ($getClass as $value)" +
                "<option {{ old('class_id') == $value->id ? 'selected' : '' }}" +
                "value='{{ $value->id }}'>{{ $value->name }}</option>" +
                "@endforeach" +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<div style='margin-bottom: 0 !important' class='form-group'>" +
                "<input type='text' class='form-control' name='email[]'>" +
                "</div>" +
                "</td>" +
                "<td>" +
                "<a href='javascript:void(0)' class='btn btn-icon icon-left btn-danger deleteRow'>" +
                "Hapus</a>" +
                "</td>" +
                "</tr>"
            $('.tbody').append(tr);
        });
        $('.tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove();
        })
    </script>
@endsection
