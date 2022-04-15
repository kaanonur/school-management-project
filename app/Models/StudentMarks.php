<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;

    protected $table = 'student_marks';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function assignSubject()
    {
        return $this->belongsTo(AssignSubject::class, 'assign_subject_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function examType()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id', 'id');
    }
}
