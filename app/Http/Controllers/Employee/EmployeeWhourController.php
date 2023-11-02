<?php

namespace App\Http\Controllers\Employee;

use App\Enums\DropDownFields;
use App\Enums\Modules;
use App\Http\Controllers\Controller;
use App\Models\Constant;
use App\Models\Employee;
use App\Models\EmployeeWhour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Invoker\Exception;

class EmployeeWhourController extends Controller
{
    public
    function checkOut(Request $request)
    {
        try {

    //$allowedIps = ['83.244.101.40','82.205.63.17', '83.244.14.93'];   
  ///          $allowdEmployees = [21,11];
 //           if ( !in_array(\Auth::user()->id,$allowdEmployees) && !in_array($request->ip(), $allowedIps)) {

 //                return response()->json(['status' => false, 'message' => 'يرجى تسجيل الدخول من المكتب فقط'], 401);                

      //      }

            DB::beginTransaction();
            if (\Auth::user()->checkin) {
                $employee_whour = EmployeeWhour::find(\Auth::user()->checkin);
                $employee_whour->status = Constant::where('module', Modules::Employee)
                    ->where('value', '2')->get()->first()->id;
                $employee_whour->last_ip = $request->ip();
                $employee_whour->update_date = date('Y-m-d H:i:s');
                $employee_whour->update_id = \Auth::user()->id;
                $employee_whour->to_time = date('Y-m-d H:i:s');
                $employee_whour->save();
                $user = Auth::user();
                $user->checkin = null;
                $user->save();
                $this->sendWhatsapp("972599528821", "Employee " . Auth::user()->name . "  check out @" . $employee_whour->to_time . " Total Hours: " . number_format(((strtotime($employee_whour->to_time) - strtotime($employee_whour->from_time)) / (60 * 60)), 2) . " hr", 'graph', 'Tabibfind', 'Tabibfind');
                $this->sendWhatsapp("970592413400", "Employee " . Auth::user()->name . "  check out @" . $employee_whour->to_time . " Total Hours: " . number_format(((strtotime($employee_whour->to_time) - strtotime($employee_whour->from_time)) / (60 * 60)), 2) . " hr", 'graph', 'Tabibfind', 'Tabibfind');
                $this->sendWhatsapp("970569848484", "Employee " . Auth::user()->name . "  check out @" . $employee_whour->to_time . " Total Hours: " . number_format(((strtotime($employee_whour->to_time) - strtotime($employee_whour->from_time)) / (60 * 60)), 2) . " hr", 'graph', 'Tabibfind', 'Tabibfind');
                //$this->sendWhatsapp("970592413400", "Employee " . $employee_whour->employee->name . " check in @" . $employee_whour->from_time . " and check out @" . $employee_whour->to_time . " Total Hours: " . number_format(((strtotime($employee_whour->to_time) - strtotime($employee_whour->from_time)) / (60 * 60)), 2) . " hr", 'graph', 'Tabibfind', 'Tabibfind');
                DB::commit();

            } else {
                return response()->json(['status' => false, 'message' => 'Please Check In'], 401);
            }
            return response()->json(['status' => true, 'mdata' => 0, 'message' => 'Done successfully!']);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 401);
        }

    }

    function checkIn(Request $request)
    {
        try {

         //   $allowedIps = ['83.244.101.40','82.205.63.17', '83.244.14.93'];   
      //      $allowdEmployees = [21,11];
        //    if ( !in_array(\Auth::user()->id,$allowdEmployees) && !in_array($request->ip(), $allowedIps)) {
                
         //       return response()->json(['status' => false, 'message' => 'يرجى تسجيل الخروج من المكتب فقط'], 401);                
    //
      //      }

            

            DB::beginTransaction();
            if (\Auth::user()->checkin) {
                return response()->json(['status' => false, 'message' => 'Please Check Out'], 401);
            } else {
                $employee=Employee::where('user_id',\Auth::user()->id)->get()->first();
                $employee_whour = new EmployeeWhour();
                $employee_whour->from_time = date('Y-m-d H:i:s');
                $employee_whour->create_user = \Auth::user()->id;
                $employee_whour->employee_id = $employee?$employee->id:0;
                $employee_whour->work_date = date('Y-m-d');
                $employee_whour->status = Constant::where('module', Modules::Employee)
                    ->where('value', '1')->get()->first()->id;
                $employee_whour->to_time = date('Y-m-d H:i:s');
                $employee_whour->last_ip = $request->ip();
                $employee_whour->update_date = date('Y-m-d H:i:s');
                $employee_whour->update_id = \Auth::user()->id;
                $employee_whour->save();
                $user = Auth::user();
                $user->checkin = $employee_whour->id;
                $user->save();

                DB::commit();
                $this->sendWhatsapp("972599528821", "Employee " .  Auth::user()->name . " check in @" . $employee_whour->from_time , 'graph', 'Tabibfind', 'Tabibfind');
                $this->sendWhatsapp("970569848484", "Employee " .  Auth::user()->name . " check in @" . $employee_whour->from_time , 'graph', 'Tabibfind', 'Tabibfind');
                $this->sendWhatsapp("970592413400", "Employee " .  Auth::user()->name . " check in @" . $employee_whour->from_time , 'graph', 'Tabibfind', 'Tabibfind');
                // $this->sendWhatsapp("970592413400", "Employee " . $employee_whour->employee->name . " check in @" . $employee_whour->from_time . " and check out @" . $employee_whour->to_time . " Total Hours: " . number_format(((strtotime($employee_whour->to_time) - strtotime($employee_whour->from_time)) / (60 * 60)), 2) . " hr", 'graph', 'Tabibfind', 'Tabibfind');

            }
            return response()->json(['status' => true, 'mdata' => $employee_whour->from_time, 'message' => 'Done successfully!']);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 401);
        }

    }

    function getCheckInOut(Request $request)
    {
        $whour = EmployeeWhour::find(\Auth::user()->checkin);
        if ($whour) {
            $time = $whour->from_time;
            return response()->json(['status' => true, 'mdata' => $time, 'message' => 'Done successfully!']);
        } else
            return response()->json(['status' => true, 'mdata' => 0, 'message' => 'Done successfully!']);
    }

    function test(string $phone, string $message)
    {
        $this->sendWhatsapp($phone,$message, 'graph', 'Wheels', 'Wheels');

    }

}
