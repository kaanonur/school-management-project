@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Student Group List</h3>
                            <a href="{{ route('student.group.create') }}" class="btn btn-rounded btn-success mb-5">Add Student Group</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $group)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $group->name }}</td>
                                            <td width="12%">
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('student.group.edit', $group->id) }}" class="btn btn-info">Edit</a>
                                                    <a id="delete" href="{{ route('student.group.delete', $group->id) }}" class="btn btn-danger">Delete</a>
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
