<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Session;
use Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('management.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('management.roles.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required'],
            'display_name' => ['required'],
            'description' => ['required']
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        Session::flash('success-message', 'Role created successfully!');
        return redirect()->route('rolesIndex');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('management.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required'],
            'display_name' => ['required'],
            'description' => ['required']
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        Role::where('id', $id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        Session::flash('success-message', 'Role updated successfully!');
        return redirect()->route('rolesIndex');
    }

    public function delete($id)
    {
        Role::where('id', $id)->delete();
        Session::flash('success-message', 'Role deleted successfully!');
        return redirect()->route('rolesIndex');
    }
}
