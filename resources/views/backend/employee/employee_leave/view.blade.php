@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Employee Leave List</h3>
                            <a href="{{ route('employee.leave.create') }}" class="btn btn-rounded btn-success mb-5">Add Employee Leave</a>
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
                                        <th>Purpose</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $leave)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $leave->user->name }}</td>
                                            <td>{{ $leave->user->id_no }}</td>
                                            <td>{{ $leave->purpose->name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($leave->start_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($leave->end_date)) }}</td>
                                            <td width="19%">
                                                <div class="text-center">
                                                    <a href="{{ route('employee.leave.edit', $leave->id) }}" class="btn btn-info">Edit</a>
                                                    <a id="delete" href="{{ route('employee.leave.delete', $leave->id) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Purpose</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
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
