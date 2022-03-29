@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">

                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student <strong>Search</strong></h4>
                    </div>

                    <div class="box-body">
                        <form method="" action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year</h5>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Year</option>
                                                @foreach($data['years'] as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
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
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $value)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $value->class_id }}</td>
                                            <td>{{ $value->year_id }}</td>
                                            <td width="12%">
                                                <div class="d-flex justify-content-between">
                                                    <a href="" class="btn btn-info">Edit</a>
                                                    <a id="delete" href="" class="btn btn-danger">Delete</a>
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
