@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Employee List</h3>
                            <a href="{{ route('employee.registration.create') }}" class="btn btn-rounded btn-success mb-5">Add Employee</a>
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
                                        <th>Mobile</th>
                                        <th>Gender</th>
                                        <th>Join Date</th>
                                        <th>Salary</th>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                            <th>Code</th>
                                        @endif
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $employee)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->id_no }}</td>
                                            <td>{{ $employee->mobile }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->join_date }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                                <td>{{ $employee->code }}</td>
                                            @endif
                                            <td width="19%">
                                                <div class="text-center">
                                                    <a href="{{ route('employee.registration.edit', $employee->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('employee.registration.show', $employee->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
{{--                                                    <a id="delete" href="{{ route('employee.registration.delete', $employee->id) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>--}}
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
