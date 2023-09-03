<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    //
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teachrer List";
        return view('admin.teacher.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Teachrer List";
        return view('admin.teacher.add', $data);
    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
        ]);

        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admission_date)) {
            $student->admission_date= trim($request->admission_date);
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->marital_status = trim($request->marital_status);
        $student->address = trim($request->address);
        $student->mobile_number = trim($request->mobile_number);
        $student->permanent_address = trim($request->permanent_address);
        $student->qualification = trim($request->qualification);
        $student->work_experience = trim($request->work_experience);
        $student->note = trim($request->note);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->user_type = 2;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect('admin/teacher/list')->with('success', "Teacher succesfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Teacher Edit";
            return view('admin.teacher.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admission_date)) {
            $student->admission_date= trim($request->admission_date);
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->marital_status = trim($request->marital_status);
        $student->address = trim($request->address);
        $student->mobile_number = trim($request->mobile_number);
        $student->permanent_address = trim($request->permanent_address);
        $student->qualification = trim($request->qualification);
        $student->work_experience = trim($request->work_experience);
        $student->note = trim($request->note);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect('admin/teacher/list')->with('success', "Teacher succesfully updated");
    }
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Teacher succesfully deletee");
        } else {
            abort(404);
        }
    }
}
