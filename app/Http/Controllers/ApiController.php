<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class ApiController extends Controller
{
    public function getAllDepartments()
    {
        return response()->json(Department::all);
    }
}
