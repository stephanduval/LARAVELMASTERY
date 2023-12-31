<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Session;

class PermissionController extends Controller
{



    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc', )->paginate(10);
        return view('management.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('management.permissions.create');
    }

    public function store(Request $request)
    {

        // return $request->all();
        if ($request->crudType == 'basic') {

            $request->validate([
                'name' => 'required',
                'display_name' => 'required',
                'description' => 'required',
            ]);

            Permission::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);

            Session::flash('success-message', 'Permission created successfully!');
        } else if ($request->crudType == 'crud') {

            $request->validate([
                'resource' => 'required',
            ]);
            $crud = $request->crudSelected;
            if (count($crud) > 0) {
                foreach ($crud as $item) {
                    $name         = strtolower($request->resource) . '-' . strtolower($item);
                    $display_name = ucwords($request->resource . ' ' . $item);
                    $description  = ucwords($request->resource . ' ' . $item);

                    // Create individual permission entries here
                    Permission::create([
                        'name' => $name,
                        'display_name' => $display_name,
                        'description' => $description,
                    ]);
                }

            }

            Session::flash('success-message', 'Permissions created successfully!');
        }

        return redirect()->route('permissionsIndex');

    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('management.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        Permission::where('id', $id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        Session::flash('success-message', 'Permission updated successfully!');
        return redirect()->route('permissionsIndex');
    }

    public function delete($id)
    {
        Permission::where('id', $id)->delete();
        Session::flash('success-message', 'Permission deleted successfully!');
        return redirect()->route('permissionsIndex');
    }

}

