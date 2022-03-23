@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update User</h4>
                    <h6 class="box-subtitle"> You can edit your profile</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>E-Mail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->email }}" name="email" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Mobile <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->mobile }}" name="mobile" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->address }}" name="address" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="usertype" class="form-control">
                                                            <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="image" type="file" name="image" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        @if($user->image == null)
                                                            <img id="showImage" class="rounded-circle" src="{{ asset('backend/images/no-image.png') }}" width="100px" height="100px" alt="User Avatar">
                                                        @else
                                                            <img id="showImage" class="rounded-circle" src="{{ asset('upload/user_images/'.$user->image) }}" width="100px" height="100px" alt="User Avatar">
                                                        @endif
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
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
