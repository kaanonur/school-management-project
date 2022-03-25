@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Student Fee Amount List</h3>
                            <a href="{{ route('fee.amount.create') }}" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Fee Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $amount)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $amount->feeCategory->name }}</td>
                                            <td width="12%">
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('fee.amount.edit', $amount->fee_category_id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('fee.amount.detail', $amount->fee_category_id) }}" class="btn btn-primary">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Fee Category</th>
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
