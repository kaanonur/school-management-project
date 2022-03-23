@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">User List</h3>
                            <a href="{{ route('user.create') }}" class="btn btn-rounded btn-success mb-5">Add User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $user)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td width="12%">
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                                    <a id="delete" href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
