@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update User</h4>
                    <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="usertype" class="form-control">
                                                            <option value="Admin" {{ $user->usertype === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            <option value="User" {{ $user->usertype === 'User' ? 'selected' : '' }}>User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User E-Mail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $user->email }}" name="email" class="form-control">
                                                    </div>
                                                    {{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                                </div>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <h5>User Password <span class="text-danger">*</span></h5>--}}
{{--                                                    <div class="controls">--}}
{{--                                                        <input type="password" name="password" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
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
