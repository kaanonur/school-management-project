@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Student</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('student.registration.update', $assignStudent->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $data['editData']->student->name }}">
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
                                                        <input type="text" name="father_name" class="form-control" value="{{ $data['editData']->student->father_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mother_name" class="form-control" value="{{ $data['editData']->student->mother_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mobile Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" value="{{ $data['editData']->student->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control" value="{{ $data['editData']->student->address }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="Male" {{ @$data['editData']->student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ @$data['editData']->student->gender == 'Female' ? 'selected' : '' }}>Female</option>
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
                                                        <input type="date" name="dob" class="form-control" value="{{ $data['editData']->student->dob }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" class="form-control" value="{{ $data['editData']->discount->discount }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" id="year_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year</option>
                                                            @foreach($data['years'] as $year)
                                                                <option value="{{ $year->id }}" {{ @$data['editData']->year_id == $year->id ? 'selected' : '' }}>
                                                                    {{ $year->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" id="class_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Class</option>
                                                            @foreach($data['classes'] as $class)
                                                                <option value="{{ $class->id }}" {{ @$data['editData']->class_id == $class->id ? 'selected' : '' }}>
                                                                    {{ $class->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" id="group_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Group</option>
                                                            @foreach($data['groups'] as $group)
                                                                <option value="{{ $group->id }}" {{ @$data['editData']->group_id == $group->id ? 'selected' : '' }}>
                                                                    {{ $group->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Shift <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" id="shift_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Shift</option>
                                                            @foreach($data['shifts'] as $shift)
                                                                <option value="{{ $shift->id }}" {{ @$data['editData']->shift_id == $shift->id ? 'selected' : '' }}>
                                                                    {{ $shift->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
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
                                                        @if($data['editData']->student->image == null)
                                                            @if($data['editData']->student->gender == 'Male')
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/avatar-1.png') }}" alt="">
                                                            @elseif($data['editData']->student->gender == 'Female')
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/avatar-2.png') }}" alt="">
                                                            @else
                                                                <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('backend/images/avatar/1.jpg') }}" alt="">
                                                            @endif
                                                        @else
                                                            <img id="showImage" class="rounded-circle" width="100px" height="100px" src="{{ asset('upload/student_images/'.$data['editData']->student->image) }}" alt="">
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
