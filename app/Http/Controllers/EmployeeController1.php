<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
 public function index(){
      return view('employees.index');
   }

   /*
   AJAX request
   */
   public function getEmployees(Request $request){

      $search = $request->search;

      if($search == ''){
         $employees = Employee::orderby('name','asc')->select('id','name')->get();
      }else{
         $employees = Employee::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array(
              "id"=>$employee->id,
              "text"=>$employee->name
         );
      }

      return response()->json($response);
   }
}
