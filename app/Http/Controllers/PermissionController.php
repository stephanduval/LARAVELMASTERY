<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Session;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('management.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('management.permissions.create');
    }

    public function store(Request $request)
    {
        // return $request->all();

        if($request->permission_type == 'basic') {
            $request->validate([
                'name' => 'required'
                'display_name' => 'required'
                'description' => 'required'
            ]);

        } else if($request->permissions_type == 'crud') {

        }
        }
    }
}
