@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Manage <strong>MarkSheet PDF View</strong></h4>
                        </div>

                        <div class="box-body" style="border: solid 1px; padding: 10px;">
                            <div class="row">
                                <div style="float: right" class="col-md-2 text-center">
                                    <?php $image_path = '/backend/images/logo/logo-3.jpg'; ?>
                                    <img src="{{ asset($image_path) }}" width="120px" height="100px">
                                </div>
                                <div class="col-md-2 text-center">

                                </div>
                                <div style="float: left" class="col-md-2 text-center">
                                    <h4><strong>Easy Learning School</strong></h4>
                                    <h6><strong>Istanbul Turkey</strong></h6>
                                    <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                                    <h6><strong>{{ $allMarks[0]->examType->name }}</strong></h6>
                                </div>
                                <div class="col-md-12">
                                    <hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;"
                                    <p><u><i>Print Date:</i> {{ date('d-m-Y') }}</u></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">
                                        @php
                                            $assignStudent = App\Models\AssignStudent::where('year_id', $allMarks[0]->year_id)
                                        ->where('class_id', $allMarks[0]->class_id)->first();
                                        @endphp
                                        <tr>
                                            <td width="50%">Student Id</td>
                                            <td width="50%">{{ $allMarks[0]->id_no }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Roll No</td>
                                            <td width="50%">{{ $assignStudent->roll }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Name</td>
                                            <td width="50%">{{ $allMarks[0]->student->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Class</td>
                                            <td width="50%">{{ $allMarks[0]->studentClass->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Session</td>
                                            <td width="50%">{{ $allMarks[0]->year->name }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">
                                        <thead>
                                        <tr>
                                            <th>Letter Grade</th>
                                            <th>Marks Interval</th>
                                            <th>Grade Point</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allGrades as $mark)
                                                <tr>
                                                    <td>{{ $mark->grade_name }}</td>
                                                    <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
                                                    <td>{{ number_format((float)$mark->grade_point,2) }} -
                                                        {{ ($mark->grade_point == 5)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br><br>
                            <div class="row"> <!-- 3td row start -->
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">SL</th>

                                            <th class="text-center">Get Marks</th>
                                            <th class="text-center">Letter Grade</th>
                                            <th class="text-center">Grade Point</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @php
                                            $totalMarks = 0;
                                            $totalPoint = 0;
                                        @endphp

                                        @foreach($allMarks as $key => $mark)
                                            @php
                                                $getMark = $mark->marks;
                                                $totalMarks = (float)$totalMarks+(float)$getMark;
                                                $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>

                                                <td class="text-center">{{ $getMark }}</td>

                                                @php
                                                    $grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$getMark],['end_marks', '>=',(int)$getMark ]])->first();
                                                    $grade_name = $grade_marks->grade_name;
                                                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                                                    $totalPoint = (float)$totalPoint+(float)$grade_point;
                                                @endphp
                                                <td class="text-center">{{ $grade_name }}</td>
                                                <td class="text-center">{{ $grade_point }}</td>

                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3"><strong style="padding-left: 30px;">Total Maks</strong></td>
                                            <td colspan="3"><strong style="padding-left: 38px;">{{ $totalMarks }}</strong></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div> <!-- // end Col md -12    -->
                            </div> <!-- end 3td row start -->



                            <br><br>


                            <div class="row">  <!--  4th row start -->
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        @php
                                            $totalGrade = 0;
                                            $pointForLetterGrade = (float)$totalPoint/(float)$total_subject;
                                            $totalGrade = App\Models\MarksGrade::where([['start_point','<=',$pointForLetterGrade],['end_point','>=',$pointForLetterGrade]])->first();
                                            $grade_point_avg = (float)$totalPoint/(float)$total_subject;
                                        @endphp
                                        <tr>
                                            <td width="50%"><strong>Grade Point Average</strong></td>
                                            <td width="50%">
                                                @if($countFail > 0)
                                                    0.00
                                                @else
                                                    {{number_format((float)$grade_point_avg,2)}}
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="50%"><strong>Letter Grade </strong></td>
                                            <td width="50%">
                                                @if($countFail > 0)
                                                    F
                                                @else
                                                    {{ $totalGrade->grade_name }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Total Marks with Fraction</td>
                                            <td width="50%"><strong>{{ $totalMarks }}</strong></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>   <!--  End 4th row start -->


                            <br><br>

                            <div class="row">  <!--  5th row start -->
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        <tbody>
                                        <tr>
                                            <td style="text-align: left;"><strong>Remrks:</strong>
                                                @if($countFail > 0)
                                                    Fail
                                                @else
                                                    {{ $totalGrade->remarks }}
                                                @endif
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>   <!--  End 5th row start -->


                            <br><br><br><br>

                            <div class="row"> <!--  6th row start -->
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Teacher</div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Parents / Guardian </div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Principal / Headmaster</div>
                                </div>

                            </div>  <!--  End 6th row start -->


                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
