@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Marks Edit</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="POST" action="{{ route('marks.entry.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($data['years'] as $year)
                                                        <option value="{{ $year->id }}"}>{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($data['classes'] as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Subject</h5>
                                            <div class="controls">
                                                <select name="assign_subject_id" id="assign_subject_id" class="form-control">
                                                    <option selected="">Select Subject</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Exam Type</h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Exam Type</option>
                                                    @foreach($data['exam_types'] as $exam)
                                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 25px;" class="col-md-3">
                                        <a id="search" class="btn btn-primary" name="search">Search</a>
                                    </div>
                                </div>
                                <!-- Mark Entry Table -->
                                <div class="row d-none mt-3" id="marks-entry">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>ID No</th>
                                                <th>Student Name</th>
                                                <th>Father Name</th>
                                                <th>Gender</th>
                                                <th>Marks</th>
                                            </tr>
                                            </thead>
                                            <tbody id="marks-entry-tr">

                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn btn-rounded btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script type="text/javascript">
        $(document).on('click','#search',function(){
            let year_id = $('#year_id').val();
            let class_id = $('#class_id').val();
            let assign_subject_id = $('#assign_subject_id').val();
            let exam_type_id = $('#exam_type_id').val();
            $.ajax({
                url: "{{ route('student.marks.getStudentsWithMarks')}}",
                type: "GET",
                data: {
                    'year_id':year_id,
                    'class_id':class_id,
                    'assign_subject_id': assign_subject_id,
                    'exam_type_id': exam_type_id
                },
                success: function (data) {
                    $('#marks-entry').removeClass('d-none');
                    let html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.father_name+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.marks+'"></td>'+
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $(document).on('change','#class_id',function(){
                var class_id = $('#class_id').val();
                $.ajax({
                    url:"{{ route('marks.getSubjects') }}",
                    type:"GET",
                    data:{class_id:class_id},
                    success:function(data){
                        var html = '<option value="">Select Subject</option>';
                        $.each( data, function(key, v) {
                            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });
        });
    </script>


@endsection
