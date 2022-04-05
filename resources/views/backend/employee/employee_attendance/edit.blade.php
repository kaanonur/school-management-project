@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Attendance</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.attendance.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control" value="{{ $data['editData'][0]->date }}">
                                                    </div>
                                                    @error('date')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-striped w-full">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                        <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center btn present_all" style="display: table-cell; background-color: #000000">Present</th>
                                                        <th class="text-center btn leave_all" style="display: table-cell; background-color: #000000">Leave</th>
                                                        <th class="text-center btn absent_all" style="display: table-cell; background-color: #000000">Absent</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data['editData'] as $key => $data)
                                                        <tr id="div_{{ $data->employee_id }}" class="text-center">
                                                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $data->user->name }}</td>
                                                            <td colspan="3">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input name="attend_status_{{$key}}" type="radio" id="present_{{$key}}" value="Present" {{ $data->attend_status == 'Present' ? 'checked' : '' }}>
                                                                    <label for="present_{{$key}}">Present</label>

                                                                    <input name="attend_status_{{$key}}" type="radio" value="Leave" id="leave_{{$key}}" {{ $data->attend_status == 'Leave' ? 'checked' : '' }}>
                                                                    <label for="leave_{{$key}}">Leave</label>

                                                                    <input name="attend_status_{{$key}}" type="radio" value="Absent" id="absent_{{$key}}" {{ $data->attend_status == 'Absent' ? 'checked' : '' }}>
                                                                    <label for="absent_{{$key}}">Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
