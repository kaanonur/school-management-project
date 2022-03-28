@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Assign Subject Details</h3>
                            <a href="{{ route('fee.amount.create') }}" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4><strong>Assign Subject: </strong>{{ $data['detailsData'][0]->studentClass->name }}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Subject</th>
                                        <th>Full Mark</th>
                                        <th>Pass Mark</th>
                                        <th>Subjective Mark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['detailsData'] as $key => $detail)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $detail->schoolSubject->name }}</td>
                                            <td width="12%">{{ $detail->full_mark }}</td>
                                            <td width="12%">{{ $detail->pass_mark }}</td>
                                            <td width="12%">{{ $detail->subjective_mark }}</td>
                                        </tr>
                                    @endforeach
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
