<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\TeacherClassSubject;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherClasSubjectController extends Controller
{
    //
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teachrer List";
        return view('admin.teacher_class_subject.list', $data);
    }
      public function edit($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectId'] = TeacherClassSubject::getAssignSubjectId($getRecord->id);
            $data['getAssignClassId'] = TeacherClassSubject::getAssignClassId($getRecord->id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            // $data['header_title'] = "Edit Assign Subject";
            $data['getTeacher'] = User::getTeacher();
            return view('admin.teacher_class_subject.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update(Request $request)
    {
    //    ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->class_id)) {
            foreach ($request->class_id as $class_id) {

                $getAlreadyFirst = TeacherClassSubject::getAlreadyFirstClass($request->teacher_id, $class_id);
                if (!empty($getAlreadyFirstClass)) {
                    $getAlreadyFirst->save();
                } else {
                    $save = new TeacherClassSubject();
                    $save->teacher_id= $request->teacher_id;
                    $save->class_id = $class_id;
                    $save->save();
                }
            }
        }
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {

                $getAlreadyFirst = TeacherClassSubject::getAlreadyFirst($request->teacher_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->save();
                } else {
                    $save = new TeacherClassSubject();
                    $save->teacher_id= $request->teacher_id;
                    $save->subject_id = $subject_id;
                    $save->save();
                }
            }
        }
        return redirect('admin/teacher_class_subject/list')->with('success', 'Subject succesfuly assign to class');
    }
}
