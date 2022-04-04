@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Employee Salary Increment</h4>
                    <h6><strong>Present Salary:</strong> {{ $user->salary }}</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.salary.update', $user->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Salary Amount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="increment_salary" class="form-control" value="{{ old('increment_salary') }}">
                                                    </div>
                                                    @error('increment_salary')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Effected Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="effected_salary" class="form-control" value="{{ old('effected_salary') }}">
                                                    </div>
                                                    @error('effected_salary')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" />
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section>
    </div>


@endsection
