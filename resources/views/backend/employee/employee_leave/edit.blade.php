@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Employee Leave Update</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.leave.update', $employeeLeave->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Employee Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="employee_id" id="employee_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Employee</option>
                                                            @foreach($data['employees'] as $employee)
                                                                <option value="{{ $employee->id }}"
                                                                    {{ $employeeLeave->employee_id == $employee->id ? 'selected': '' }}
                                                                >{{ $employee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('employee_id')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Start Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="start_date" class="form-control" value="{{ $employeeLeave->start_date }}">
                                                    </div>
                                                    @error('start_date')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Leave Purpose<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="leave_purpose_id" id="leave_purpose_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Leave Purpose</option>
                                                            @foreach($data['leave_purposes'] as $leavePurpose)
                                                                <option value="{{ $leavePurpose->id }}"
                                                                    {{ $employeeLeave->leave_purpose_id == $leavePurpose->id ? 'selected': '' }}
                                                                >{{ $leavePurpose->name }}</option>
                                                            @endforeach
                                                            <option value="0">New Purpose</option>
                                                        </select>
                                                        <input type="text" name="new_purpose_name" id="add_purpose" class="form-control mt-1 d-none" placeholder="Write a new purpose">
                                                    </div>
                                                    @error('employee_id')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>End Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="end_date" class="form-control" value="{{ $employeeLeave->end_date }}">
                                                    </div>
                                                    @error('end_date')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" />
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

    <script type="text/javascript">
        $(document).ready(function (){
            $('#leave_purpose_id').change(function (e){
                let leave_purpose_id = $(this).val();
                if (leave_purpose_id == 0) {
                    $('#add_purpose').removeClass('d-none');
                } else {
                    $('#add_purpose').addClass('d-none');
                }
            });
        });
    </script>

@endsection
