<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'salary'
    ];

    static function getOvertime($date){
        $result = DB::table('overtimes a')
        ->join('employee b', 'a.employee_id', '=', 'b.id')
        ->whereBetween('data', [$data.'-01', $data.'-31'])
        ->get();
        return $result;
    }

    public function overtimes(){
        return $this->hasMany(Overtime::class, 'employee_id', 'id')
        ->select('*')
        ->selectRaw('hour(TIMEDIFF(time_ended, time_started)) as overtime_duration');
    }
}