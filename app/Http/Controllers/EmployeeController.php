<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Helpers\ApiFormatter;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $data=Employee::all();
        $response = ApiFormatter::createAPIResponse(false, 200, '', $data);
        return response()->json($response, 200);
    }
    
    public function store(EmployeeRequest $request){

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->salary = $request->salary;
        $employee_save = $employee->save();

        if($employee_save){
            $response = ApiFormatter::createAPIResponse(false, 201, 'Added Employee Successfully', null);
            return response()->json($response, 200);
        }else{
            $response = ApiFormatter::createAPIResponse(true, 400, 'Added Employee Failed', null);
            return response()->json($response, 400);
        }
    }
}