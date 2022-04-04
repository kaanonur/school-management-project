@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Employee</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.registration.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                    </div>
                                                    {{--                                                    @error('name')--}}
                                                    {{--                                                    <div class="form-control-feedback text-danger">{{ $message }}</small></div>--}}
                                                    {{--                                                    @enderror--}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="father_name" class="form-control" value="{{ $user->father_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mother_name" class="form-control" value="{{ $user->mother_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mobile Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="Male" {{ @$user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ @$user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date of Birth<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designation <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" id="designation_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year</option>
                                                            @foreach($data['designation'] as $designation)
                                                                <option value="{{ $designation->id }}" {{ @$user->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('designation_id')
                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-4">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <h5>Joining Date<span class="text-danger">*</span></h5>--}}
{{--                                                    <div class="controls">--}}
{{--                                                        <input type="date" name="join_date" class="form-control" value="{{ $user->join_date }}">--}}
{{--                                                        @error('join_date')--}}
{{--                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>--}}
{{--                                                        @enderror--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="row">
{{--                                            <div class="col-md-4">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <h5>Salary <span class="text-danger">*</span></h5>--}}
{{--                                                    <div class="controls">--}}
{{--                                                        <input type="text" name="salary" class="form-control" value="{{ $user->salary }}">--}}
{{--                                                        @error('salary')--}}
{{--                                                        <div class="form-control-feedback text-danger">{{ $message }}</small></div>--}}
{{--                                                        @enderror--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Profile Image</h5>
                                                    <div class="controls">
                                                        <input id="image" type="file" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        @if($user->image == null)
                                                            @if($user->gender == 'Male')
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/avatar-1.png') }}" alt="">
                                                            @elseif($user->gender == 'Female')
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/avatar-2.png') }}" alt="">
                                                            @else
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/1.jpg') }}" alt="">
                                                            @endif
                                                        @else
                                                            <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('upload/employee_images/'.$user->image) }}" alt="">
                                                        @endif
                                                    </div>
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

    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
