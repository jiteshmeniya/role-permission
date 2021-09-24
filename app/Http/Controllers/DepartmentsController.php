<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(){

        // Fetch departments
        $departments['data'] = Department::orderby("name","asc")
            ->select('id','name')
            ->get();

        // Load index view
        return view('departments.index')->with("departments",$departments);
    }

    // Fetch records
    public function getEmployees($departmentid=0){

        // Fetch Employees by Departmentid
        $empData['data'] = Employee::orderby("name","asc")
            ->select('id','name')
            ->where('department',$departmentid)
            ->get();

        return response()->json($empData);

    }
}
