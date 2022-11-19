<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Requests\OvertimeRequest;
use App\Models\Overtime;

class OvertimeController extends Controller
{
    public function store(OvertimeRequest $request){
        
        $overtime = new Overtime();
        $overtime->employee_id = $request->employee_id;
        $overtime->date = $request->date;
        $overtime->time_started = $request->time_started;
        $overtime->time_ended = $request->time_ended;
        $overtime_save = $overtime->save();

        if($overtime_save){
            $response = ApiFormatter::createAPIResponse(false, 201, 'Added overtime successfully', null);
            return response()->json($response, 200);
        }else{
            $response = ApiFormatter::createAPIResponse(true, 400, 'Added overtime failed', null);
            return response()->json($response, 400);
        }
    }
}