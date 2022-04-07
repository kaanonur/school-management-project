@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Employee Salary List</h3>
                            <a href="{{ route('account.salary.create') }}" class="btn btn-rounded btn-success mb-5">Add / Edit Employee Salary</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>ID No</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $value)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $value->user->id_no }}</td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->amount }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>ID No</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
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
