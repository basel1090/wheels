<?php

namespace App;

use Exception;
use Illuminate\Support\Facades\Route;

class AppPermissionsHelper
{

    /*
        :::::::: IMPORTANT NOTE ::::::::

        all permission should have postfix as one of the following
        _access
        _add
        _edit
        _delete
    */
    public static function getPermissions()
    {
        $permissions = [
            "User Management Module" => [
                "Manage" => 'user_management_access'
            ],
            "Settings Module" => [
                "Country and City" => "settings_country_city_access",
                "Menu settings" => "settings_menu_access",
                "Constants" => "settings_constants_access",
                'Questionnaires' => 'settings_questionnaire_access'
            ],
            "Restaurants" => [
                "access" => "restaurant_access",
                "add" => 'restaurant_add',
                "edit" => 'restaurant_edit',
                "delete" => 'restaurant_delete',
            ],
            "Captins" => [

                "access" => "captin_access",
                "add" => 'captin_add',
                "edit" => 'captin_edit',
                "delete" => 'captin_delete',
            ],
            "Captins Calls" => [
                "access" => "captin_call_access",
                "add" => 'captin_call_add',
                "edit" => 'captin_call_edit',
                "delete" => 'captin_call_delete',
            ],
            "Calls Module" => [
                "access" => "calls_module_access",
                "add" => 'calls_module_add',
                "edit" => 'calls_module_edit',
                "delete" => 'calls_module_delete',
            ],
            "Calls Task Module" => [
                "access" => "callTasks_module_access",
                "add" => 'callTasks_module_add',
                "edit" => 'callTasks_module_edit',
                "delete" => 'callTasks_module_delete',
            ],
            "CDR" => [
                "access" => "cdr_access",
            ],
            "Employee" => [
                "access" => "employee_access",
                "add" => 'employee_add',
                "edit" => 'employee_edit',
                "delete" => 'employee_delete',
            ],
            "Captin SMS" => [
                "access" => "captin_sms_access",
                "add" => "captin_sms_add",
            ],
             "callTask_sms" => [
        "access" => "callTask_sms_access",
        "add" => "callTask_sms_add",
    ]





        ];
        $permissionFlatten = collect($permissions)->unique()->flatten(1);
        self::CheckMiddlewares($permissionFlatten);
        return $permissions;
    }

    private static function CheckMiddlewares($usedPermissions)
    {


        $routes = Route::getRoutes()->getRoutesByName();
        $remove = [
            'sanctum.csrf-cookie',  'ignition.healthCheck',
            'ignition.executeSolution',
            'ignition.updateConfig',
            'login',
            'authenticate',
            'logout',
            'home',
            'setLanguage'
        ];

        $routes = array_diff_key($routes, array_flip($remove));
        // $routeNames = array_keys($routes);

        $routesAndPermissions = [];

        foreach ($routes as $route) {
            $routeMiddleware = collect($route->action['middleware']);
            $filtered = $routeMiddleware->filter(function ($value, $key) {
                if (strpos($value, "permission:") === 0) {
                    return $value;
                }
            })->map(function ($item, $key) {
                $permission = substr($item, 11);
                $permissions = explode("|", $permission);
                return $permissions;
            })->flatten(1);
            // dd($filtered);
            foreach ($filtered as $permissionMiddleware) {
                # code...
                array_push($routesAndPermissions, $permissionMiddleware);
            }
        }
        $routesAndPermissions = collect($routesAndPermissions)->unique();
        if ($routesAndPermissions->diff($usedPermissions)->count() > 0) {

            $diff = $routesAndPermissions->diff($usedPermissions)->toArray();
            throw new Exception("Please Check AppPermissionsHelper.php file \n middleware used in web routes aren't included!" . implode(",", $diff));
        }
    }
}
