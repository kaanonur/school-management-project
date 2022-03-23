@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black">
                                <h3 class="widget-user-username">{{ $user->name }}</h3>
                                <h6 class="widget-user-desc">{{ $user->usertype }}</h6>
                                <h6 class="widget-user-desc">{{ $user->email }}</h6>
                                <a style="float: right; margin-top: -20px;" href="{{ route('profile.edit') }}"
                                   class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                            </div>
                            <div class="widget-user-image">
                                @if($user->image == null)
                                    @if($user->gender == 'Male')
                                        <img style="height: 90px !important;" class="rounded-circle" src="{{ asset('backend/images/avatar/avatar-1.png') }}" alt="User Avatar">
                                    @elseif($user->gender == 'Female')
                                        <img style="height: 90px !important;" class="rounded-circle" src="{{ asset('backend/images/avatar/avatar-2.png') }}" alt="User Avatar">
                                    @else
                                        <img style="height: 90px !important;" class="rounded-circle" src="{{ asset('backend/images/avatar/1.jpg') }}" alt="User Avatar">
                                    @endif
                                @else
                                    <img style="height: 90px !important;" class="rounded-circle" src="{{ asset('upload/user_images/'.$user->image) }}" alt="User Avatar">
                                @endif
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Mobile</h5>
                                            <span class="description-text">{{ $user->mobile }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Address</h5>
                                            <span class="description-text">{{ $user->address }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Gender</h5>
                                            <span class="description-text">{{ $user->gender }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
@endsection
