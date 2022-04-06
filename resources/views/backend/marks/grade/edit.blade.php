@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Grade Marks</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('marks.grade.update', $marksGrade->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" class="form-control" value="{{ $marksGrade->grade_name }}">
                                                    </div>
                                                    @error('grade_name')
                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point" class="form-control" value="{{ $marksGrade->grade_point }}">
                                                        @error('grade_point')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Marks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_marks" class="form-control" value="{{ $marksGrade->start_marks }}">
                                                        @error('start_marks')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Marks<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_marks" class="form-control" value="{{ $marksGrade->end_marks }}">
                                                        @error('end_marks')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" class="form-control" value="{{ $marksGrade->start_point }}">
                                                        @error('start_point')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" class="form-control" value="{{ $marksGrade->end_point }}">
                                                        @error('end_point')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Remarks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remarks" class="form-control" value="{{ $marksGrade->remarks }}">
                                                        @error('remarks')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
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
@endsection
