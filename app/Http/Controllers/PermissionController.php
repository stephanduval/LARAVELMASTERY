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
}
