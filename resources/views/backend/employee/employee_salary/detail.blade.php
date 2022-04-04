@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Salary Details</h3>
                            <p>
                            <h6><strong>Employee Name:</strong> {{ $user->name }}</h6>
                            <h6><strong>Employee ID No:</strong> {{ $user->id_no }}</h6>
                            </p>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Previous Salary</th>
                                        <th>Increment Salary</th>
                                        <th>Present Salary</th>
                                        <th>Effected Salary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->employeeSalary as $key => $salary)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td>{{ $salary->previous_salary }}</td>
                                            <td>{{ $salary->increment_salary }}</td>
                                            <td>{{ $salary->present_salary }}</td>
                                            <td>{{ $salary->effected_salary }}</td>
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
