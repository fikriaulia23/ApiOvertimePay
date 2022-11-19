<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Requests\OvertimepayRequest;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Setting;
use DB;

class OvertimepayController extends Controller
{
    public function calculate(OvertimepayRequest $request){

        $data = Employee::with('overtimes')
        ->get();

        $setOption = Setting::with('references')
        ->first();

        foreach ($data as $employee) {
            $sum = 0;
            foreach ($employee->overtimes as $overtime) {
                $sum += $overtime['overtime_duration'];
            }
            $employee->overtime_duration = $sum;
            if($setOption->value == 1){
                $employee->amount = $employee->salary/173 * $employee->overtime_duration;
            }else if($setOption->value == 2){
                $employee->amount = 10000 * $employee->overtime_duration;
            }
        }

        $response = ApiFormatter::createAPIResponse(false, 200, '', $data);
        return response()->json($response, 200);
    }
}