<?php

namespace App\Http\Controllers;

use App\Enums\DropDownFields;
use App\Enums\Modules;
use App\Models\Constant;
use App\Models\Hospital;
use App\Models\Patient;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $type=$request->type;




        return view('dashboard.index');
    }
    public function employee(Request $request)
    {

        $data["from"] = $request->from;
        $data["to"] = $request->to;

        $data["employee_name"] = 'mahmoud';

        return view('dashboard.employees',$data);
    }
}
