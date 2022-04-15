@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Grade Marks List</h3>
                            <a href="{{ route('marks.grade.create') }}" class="btn btn-rounded btn-success mb-5">Add Grade Mark</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th>Grade Name</th>
                                        <th>Grade Point</th>
                                        <th>Start Marks</th>
                                        <th>End Marks</th>
                                        <th>Point Range</th>
                                        <th>Remarks</th>
                                        <th width="19%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['allData'] as $key => $value)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $value->grade_name }}</td>
                                            <td>{{ number_format((float) $value->grade_point, 2) }}</td>
                                            <td>{{ $value->start_marks }}</td>
                                            <td>{{ $value->end_marks }}</td>
                                            <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
                                            <td>{{ $value->remarks }}</td>
                                            <td width="13%">
                                                <div class="text-center">
                                                    <a href="{{ route('marks.grade.edit', $value->id) }}" class="btn btn-info">Edit</a>
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
