<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function list()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $nameArray = $request->input('name');
        $genderArray = $request->input('gender');
        $nisArray = $request->input('nis');
        $classArray = $request->input('class_id');
        $emailArray = $request->input('email');

        // Menggunakan perulangan untuk menyimpan data siswa
        for ($i = 0; $i < count($nisArray); $i++) {
            $student = new User;
            $student->name = $nameArray[$i];
            $student->gender = $genderArray[$i];
            $student->nis = $nisArray[$i];
            $student->email = $emailArray[$i];
            $student->class_id = $classArray[$i];
            $student->user_type = 3;
            $student->save();
        }
        return redirect('admin/student/list')->with('success', "Student succesfully created");
    }
    public function update($id, Request $request)
    {
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->gender = trim($request->gender);
        $student->nis = trim($request->nis);
        $student->email = trim($request->email);
        $student->class_id = trim($request->class_id);
        $student->save();

        return redirect('admin/student/list')->with('success', "Student succesfully updated");
    }
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Student succesfully deletee");
        } else {
            abort(404);
        }
    }

    //
}
