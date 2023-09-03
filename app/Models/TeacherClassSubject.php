<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClassSubject extends Model
{
    use HasFactory;
    protected $table = 'teacher_class_subject';

    static public function getAlreadyFirstClass($teacher_id, $class_id)
    {
        return self::where('teacher_id', '=', $teacher_id)->where('class_id', '=', $class_id)->first();
    }
    static public function getAlreadyFirst($teacher_id, $subject_id)
    {
        return self::where('teacher_id', '=', $teacher_id)->where('subject_id', '=', $subject_id)->first();
    }
    static public function getAssignSubjectId($id)
    {
        return self::where('teacher_id', '=', $id)->get();
    }
    static public function getAssignClassId($id)
    {
        return self::where('teacher_id', '=', $id)->get();
    }
}
