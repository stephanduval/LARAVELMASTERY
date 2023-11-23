<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Role;

class ApiController extends Controller
{
    public function getAllDepartments()
    {
        return response()->json(Department::all());
    }

    public function getAllRoles()
    {
        return response()->json(Role::all());
    }
}
