<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class PharmacistDataController extends Controller
{
    public function departments()
    {
        $departments = Department::all();

        return response()->json($departments);
    }
}
