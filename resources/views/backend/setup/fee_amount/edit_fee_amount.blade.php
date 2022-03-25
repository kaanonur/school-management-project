@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Fee Amount</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('fee.amount.update', $data['editData'][0]->fee_category_id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="add_item">


                                            <div class="form-group">
                                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Fee Category
                                                        </option>
                                                        @foreach($data['fee_categories'] as $category)
                                                            <option
                                                                value="{{ $category->id }}"
                                                                {{ ($data['editData'][0]->fee_category_id == $category->id) ? "selected": "" }}
                                                            >{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @foreach($data['editData'] as $item)
                                                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <h5>Student Class <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <select name="class_id[]" class="form-control">
                                                                        <option value="" selected="" disabled="">Select
                                                                            Class
                                                                        </option>
                                                                        @foreach($data['classes'] as $class)
                                                                            <option
                                                                                value="{{ $class->id }}"
                                                                                {{ $item->class_id == $class->id ? "selected" : '' }}
                                                                            >{{ $class->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <h5>Amount <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="amount[]"
                                                                           class="form-control"
                                                                           value="{{ $item->amount }}">
                                                                </div>
                                                                @error('name')
                                                                <div
                                                                    class="form-control-feedback text-danger">{{ $message }}</small></div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 pt-25">
                                                        <span class="btn btn-success addItem"><i
                                                                class="fa fa-plus-circle"></i></span>
                                                            <span class="btn btn-danger removeItem"><i
                                                                    class="fa fa-minus-circle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div> <!-- end add_item -->
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update"/>
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

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Student Class <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id[]" class="form-control">
                                    <option value="" selected="" disabled="">Select Class</option>
                                    @foreach($data['classes'] as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Amount <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="amount[]" class="form-control" value="{{ old('amount') }}">
                            </div>
                            @error('name')
                            <div class="form-control-feedback text-danger">{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 pt-25">
                        <span class="btn btn-success addItem"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeItem"><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            let counter = 0;
            $(document).on("click", ".addItem", function () {
                console.log('click');
                let whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });

            $(document).on("click", ".removeItem", function (event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>

@endsection
