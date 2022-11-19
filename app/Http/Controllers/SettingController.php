<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Helpers\ApiFormatter;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function patch(SettingRequest $request)
    {
        $patch = Setting::find(1);        
        $patch->value = $request->input('value');       
        $patch->save();
        
        if($patch){
            $response = ApiFormatter::createAPIResponse(false, 201, 'Update setting successfully', null);
            return response()->json($response, 200);
        }else{
            $response = ApiFormatter::createAPIResponse(true, 400, 'Update setting failed', null);
            return response()->json($response, 400);
        }
    }
}