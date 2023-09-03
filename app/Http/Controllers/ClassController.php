<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }
    public function add()
    {
        // $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Add New Class";
        return view('admin.class.add', $data);
    }
    public function insert(Request $request)
    {
        $user = new ClassModel();
        $user->name = $request->name;
        $user->status = $request->status;
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect('admin/class/list')->with('success', "Class succesfully created");
    }
    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Class";
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();
        return redirect('admin/class/list')->with('success', "Class succesfully updated");
    }
    public function delete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Class succesfully deleted");
    }
}
