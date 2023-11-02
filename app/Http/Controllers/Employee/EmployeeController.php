<?php

namespace App\Http\Controllers\Employee;

use App\Enums\DropDownFields;
use App\Enums\Modules;
use App\Http\Controllers\Controller;
use App\Models\Constant;
use App\Models\EmployeeWhour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    function listWhour(Request $request)
    {


        $columns = $request->input('columns');
        $employee_name =   $columns[1]['search']['value'];


        $whour = EmployeeWhour::getWhourByEmployee(0);
       // return $whour->toRawSql();


        $table = Datatables::of($whour)
            ->editColumn('active', function ($data) use ($request) {


                return ' <span class="' . ($data->status == 92 ? 'badge-success' : 'badge-warning') . ' badge badge-sm">' . Constant::find($data->status)->name. '</span>';

            })
            ->filterColumn('employee.name', function ($query, $keyword) use ($request) {
                $columns = $request->input('columns');
                $value = $columns[1]['search']['value'];
                $query->whereHas('employee', function ($subQuery) use ($value) {
                    $subQuery->where('name', 'like', "%" . $value . "%");
                    $subQuery->orWhere('mobile', 'like', "%" . $value . "%");
                });
            })

            ->editColumn('work_date', function ($data) use ($request) {
                return date('l', strtotime($data->work_date)) . "-" . $data->work_date;

            })
            ->setRowClass(function ($data) {

                return $data->status == 92 ? 'table-success' : 'table-danger';
            })
            ->editColumn('to_time', function ($data) use ($request) {
                return $data->to_time == $data->from_time  ?'...':$data->to_time;
            })
            ->editColumn('last_ip', function ($data) use ($request) {
                return $data->last_ip;
            })
            ->editColumn('update_id', function ($data) use ($request) {
                return  User::find($data->update_id)?User::find($data->update_id)->name:'';
            })
            ->editColumn('hours', function ($data) use ($request) {

                return number_format(
                    ((strtotime($data->to_time>$data->from_time ? $data->to_time : date('Y-m-d H:i:s'))) - strtotime($data->from_time)) / (60 * 60),1);
            });


        if ($request->ajax()) {
            $table->addColumn('m_action', function ($data) use ($request ) {

                    return "";
            });
        }


        $table = $table->escapeColumns([])->make(true);


        if ($request->ajax())
            return $table;


    }

}
