<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeWhour extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function status()
    {
        return $this->belongsTo(Constant::class,'status');
    }
    public static function getWhourByEmployee( $status = 0)
    {
        $result = self::with('status')->with('employee');

        if ($status)
            $result = $result->where("employee_whours.status", $status);



        return $result->wherein('employee_whours.id',User::pluck('checkin')->toArray())
            ->orwhere(function ($q){$q->where('from_time','>=',date('Y-m-d'). " 00:00:00")->where('from_time','<',date('Y-m-d H:i:s'));});
    }


}
