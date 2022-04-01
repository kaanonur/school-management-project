@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="GET" action="{{ route('student.year.class.wise') }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($data['years'] as $year)
                                                        <option value="{{ $year->id }}" {{ @$data['year_id'] == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($data['classes'] as $class)
                                                        <option value="{{ $class->id }}" {{ @$data['class_id'] == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 25px;" class="col-md-4">
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Student List</h3>
                            <a href="{{ route('student.registration.create') }}" class="btn btn-rounded btn-success mb-5">Add Student</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Roll</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Image</th>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                            <th>Code</th>
                                        @endif
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $value)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $value->student->name }}</td>
                                            <td>{{ $value->student->id_no }}</td>
                                            <td>{{ $value->roll }}</td>
                                            <td>{{ $value->studentYear->name }}</td>
                                            <td>{{ $value->studentClass->name }}</td>
                                            <td>
                                                @if($value->student->image == null)
                                                    @if($value->student->gender == 'Male')
                                                        <img class="rounded-circle" width="60px" height="60px" src="{{ asset('backend/images/avatar/avatar-1.png') }}" alt="">
                                                    @elseif($value->student->gender == 'Female')
                                                        <img class="rounded-circle" width="60px" height="60px" src="{{ asset('backend/images/avatar/avatar-2.png') }}" alt="">
                                                    @else
                                                        <img class="rounded-circle" width="60px" height="60px" src="{{ asset('backend/images/avatar/1.jpg') }}" alt="">
                                                    @endif
                                                @else
                                                    <img class="rounded-circle" width="60px" height="60px" src="{{ asset('upload/student_images/'.$value->student->image) }}" alt="">
                                                @endif
                                            </td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                                <td>{{ $value->student->code }}</td>
                                            @endif
                                            <td width="19%">
                                                <div class="text-center">
                                                    <a href="{{ route('student.registration.edit', $value->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('student.registration.show', $value->id) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a id="delete" href="{{ route('student.registration.delete', $value->id) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>


@endsection
