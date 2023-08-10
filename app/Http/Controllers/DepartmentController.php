<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

use Session;

class DepartmentController extends Controller
{




    //  below code is related to VUEjs crud

    public function storeDepartment(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']

        ]);

        Department::create([
            'user_id' => 1,
            'name' => $request->name,
            'director_id' => $request->director_id,

        ]);

        return response()->json("success");
    }

    public function updateDepartment(Request $request, $id)
    {

        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']

        ]);


        Department::where('id', $id)->update([
            'name' => $request->name,
            'director_id' => $request->director_id,

        ]);

        return response()->json("success");
    }

    public function deleteDepartment($id)
    {
        Department::where('id', $id)->delete();
        return response()->json('success');
    }


    //  below code is related to laravel crud
    public function getDepartments()
    {
        return response()->json(Department::latest()->get());
    }


    public function index()
    {
        $departments = Department::all();
        return view('management.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('management.departments.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']

        ]);

        Department::create([
            'user_id' => 1,
            'name' => $request->name,
            'director_id' => $request->director_id,

        ]);

        Session::flash('success-message', 'Department created sucessfully!');
        return redirect()->route('departmentsIndex');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('management.departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => ['required'],
            'director_id' => ['required']

        ]);

        Department::where('id', $id)->update([
            'name' => $request->name,
            'director_id' => $request->director_id,

        ]);

        Session::flash('success-message', 'Department updated sucessfully!');
        return redirect()->route('departmentsIndex');
    }

    public function delete($id)
    {
        Department::where('id', $id)->delete();

        Session::flash('success-message', 'Department deleted sucessfully!');
        return redirect()->route('departmentsIndex');
    }
}
