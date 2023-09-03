<?php

namespace App\Http\Controllers;

use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Add Subject";
        return view('admin.subject.add', $data);
    }
    public function insert(Request $request)
    {
        $user = new SubjectModel();
        $user->name = $request->name;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect('admin/subject/list')->with('success', "Subject succesfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getsingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $user = SubjectModel::getsingle($id);
        $user->name = $request->name;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();

        return redirect('admin/subject/list')->with('success', "Subject succesfully updated");
    }
    public function delete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Subject succesfully deleted");
    }

    // studetn side
    public function mySubject()
    {
        $data['getRecord'] = ClassSubjectModel::mySubject(Auth::user()->class_id);

        $data['header_title'] = "My Subject List";
        return view('student.my_subject', $data);
    }

    //parent side
    public function parentStudentSubject($student_id)
    {
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;
        $data['getRecord'] = ClassSubjectModel::mySubject($user->class_id);

        $data['header_title'] = "";
        return view('parent.my_student_subject', $data);
    }
}
