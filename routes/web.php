<?php


use App\Http\Controllers\Conversations\{
    SysNotifiController,
    SysSmsNotifiController,
    WhatsAppHistoryController,
};


use App\Http\Controllers\Restaurant\{
    RestaurantController,
    RestaurantEmployeeController,
    RestaurantMenuItemController,
    RestaurantBranchController,
    RestaurantAttachmentController
};

use App\Http\Controllers\Captins\{
    CaptinController,
    CaptinAttachmentController,

};
use App\Http\Controllers\Calls\{
    CaptinCallController,
    CallTasksCallController

};
use App\Http\Controllers\SMS\{
    CaptinSMSController,
CallTaskSMSController

};

use App\Http\Controllers\Settings\{
    ConstantsController,
    MenuController,
    QuestionnaireController,
};
use App\Http\Controllers\UserManagement\{
    PermissionController,
    RolesController,
    UsersController
};
use App\Http\Controllers\{
    Authentication\LoginController,
    CallScheduleController,
    CountryCityController,
    DashboardController,

    LanguageSwitcherController,
    MarketingCallController,

    Procedures\ProcedureController,

};
use App\Http\Controllers\Employee\{
    EmployeeController,
    EmployeeWhourController,
};
use App\Http\Controllers\CDR\{
    CallsController,
    CdrController,
    CallTaskController
};
use App\Http\Controllers\SMS\{
    SMSController
};
use App\Http\Controllers\CALLS\{
    CallController
};
use App\Http\Controllers\Complains\ComplainController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', function () {
    return view('authentication.signIn');
})->name('login');


Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/updateCDR', [CdrController::class, 'updateLocalCDR'])->name('updateLocalCDR');
Route::middleware(['auth', 'language'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::impersonate();

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });


    //Set Locale
    Route::get('/setLangauge/{language}', [LanguageSwitcherController::class, 'setLanguage'])->name('setLanguage');

    Route::prefix('user-management')->name('user-management.')->group(function () {
        Route::prefix('permissions')->name('permissions.')
            ->middleware(['permission:user_management_access'])
            ->group(function () {
                Route::match(['get', 'post'], '/', [PermissionController::class, 'index'])->name('index');
                Route::post('/add-permission', [PermissionController::class, 'addPermission'])->name('add');
                Route::post('/delete-permission/{permission}', [PermissionController::class, 'deletePermission'])->name('delete');
            });

        Route::prefix('roles')->name('roles.')
            ->middleware(['permission:user_management_access'])
            ->group(function () {
                Route::get('/', [RolesController::class, 'index'])->name('index');
                Route::get('/getCards', [RolesController::class, 'getCards'])->name('getCards');
                Route::get('/create', [RolesController::class, 'create'])->name('create');
                Route::post('/store', [RolesController::class, 'store'])->name('store');
                Route::get('/{role}/edit', [RolesController::class, 'edit'])->name('edit');
                Route::post('{role}/update', [RolesController::class, 'update'])->name('update');
                Route::delete('{role}/delete', [RolesController::class, 'delete'])->name('delete');
            });

        Route::prefix('users')->name('users.')
            ->middleware(['permission:user_management_access'])
            ->group(function () {
                Route::match(['get', 'post'], '/', [UsersController::class, 'index'])->name('index');
                Route::get('/create', [UsersController::class, 'create'])->name('create');
                Route::post('/store', [UsersController::class, 'store'])->name('store');
                Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('edit');
                Route::post('{user}/update', [UsersController::class, 'update'])->name('update');
                Route::delete('{user}/delete', [UsersController::class, 'delete'])->name('delete');

                Route::get('/export', [UsersController::class, 'export'])->name('export');
            });
    });


    Route::prefix('settings')->name('settings.')
        ->group(function () {
            Route::prefix('CountriesCities')->name('country-city.')
                ->middleware(['permission:settings_country_city_access'])
                ->group(function () {
                    Route::get('/', [CountryCityController::class, 'index'])->name('index');
                    Route::post('/Countries', [CountryCityController::class, 'countries'])->name('countries');
                    Route::post('/Cities', [CountryCityController::class, 'cities'])->name('cities');

                    Route::get('country/create', [CountryCityController::class, 'country_create'])->name('country.create');
                    Route::post('country/store', [CountryCityController::class, 'country_store'])->name('country.store');
                    Route::get('country/{country}/edit', [CountryCityController::class, 'country_edit'])->name('country.edit');
                    Route::post('country/{country}/update', [CountryCityController::class, 'country_update'])->name('country.update');
                    Route::delete('country/{country}/delete', [CountryCityController::class, 'country_delete'])->name('country.delete');

                    Route::get('city/create', [CountryCityController::class, 'city_create'])->name('city.create');
                    Route::post('city/store', [CountryCityController::class, 'city_store'])->name('city.store');
                    Route::get('city/{city}/edit', [CountryCityController::class, 'city_edit'])->name('city.edit');
                    Route::post('city/{city}/update', [CountryCityController::class, 'city_update'])->name('city.update');
                    Route::delete('city/{city}/delete', [CountryCityController::class, 'city_delete'])->name('city.delete');
                });

            Route::prefix('Menus')->name('menus.')
                ->middleware(['permission:settings_menu_access'])
                ->group(function () {
                    Route::match(['GET', 'POST'], '/', [MenuController::class, 'index'])->name('index');
                    Route::get('/{menu}/edit', [MenuController::class, 'edit'])->name('edit');
                    Route::post('{menu}/update', [MenuController::class, 'update'])->name('update');
                });


            Route::prefix('questionnaires')->name('questionnaires.')
                ->middleware(['permission:settings_questionnaire_access'])
                ->group(function () {
                    Route::match(['GET', 'POST'], '/', [QuestionnaireController::class, 'index'])->name('index');
                    Route::get('/create', [QuestionnaireController::class, 'create'])->name('create');
                    Route::post('/store', [QuestionnaireController::class, 'store'])->name('store');
                    Route::get('/{questionnaire}/edit', [QuestionnaireController::class, 'edit'])->name('edit');
                    Route::post('{questionnaire}/update', [QuestionnaireController::class, 'update'])->name('update');
                    Route::delete('{questionnaire}/delete', [QuestionnaireController::class, 'delete'])->name('delete');

                    Route::get('{questionnaire}/get_questions', [QuestionnaireController::class, 'getQuestionnaireQuestions'])->name('get_questions');
                });


            Route::prefix('Constants')->name('constants.')
                ->middleware(['permission:settings_constants_access'])
                ->group(function () {
                    Route::match(['GET', 'POST'], '/', [ConstantsController::class, 'index'])->name('index');
                    Route::post('/store', [ConstantsController::class, 'store'])->name('store');
                    Route::get('/{constant}/edit', [ConstantsController::class, 'edit'])->name('edit');
                    Route::post('/{constant}/update', [ConstantsController::class, 'update'])->name('update');
                });
        });

    Route::prefix('restaurants')->name('restaurants.')
        ->group(function () {
            Route::get('/export', [RestaurantController::class, 'export'])->name('export')->middleware(['permission:restaurant_access']);
            Route::get('/getCitiesForSelectedCountry/{country}', [CountryCityController::class, 'getCountryCities'])->name('getCountryCities');
            Route::match(['get', 'post'], '/', [RestaurantController::class, 'index'])->name('index')
                ->middleware(['permission:restaurant_access']);
            Route::get('/create', [RestaurantController::class, 'create'])->name('create')->middleware(['permission:restaurant_add']);
            Route::post('/store', [RestaurantController::class, 'store'])->name('store')->middleware(['permission:restaurant_add']);
            Route::get('/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('edit')->middleware(['permission:restaurant_edit']);
            Route::post('{restaurant}/update', [RestaurantController::class, 'update'])->name('update')->middleware(['permission:restaurant_edit']);
            Route::delete('{restaurant}/delete', [RestaurantController::class, 'delete'])->name('delete')->middleware(['permission:restaurant_delete']);
            Route::post('/Restaurant/{Id?}', [RestaurantController::class, 'Restaurant'])->name('addedit')
                ->middleware(['permission:restaurant_add']);
            Route::get('/getByTelephone/{telephone}', [RestaurantBranchController::class, 'getByTelephone'])->name('getByTelephone');

            Route::get('/addEmployee', [RestaurantEmployeeController::class, 'createEmployee'])->name('employees.add')->middleware(['permission:restaurant_edit']);
            Route::post('/storeEmployee', [RestaurantEmployeeController::class, 'storeEmployee'])->name('employees.store')->middleware(['permission:restaurant_edit']);
            Route::get('{employee}/editEmployee', [RestaurantEmployeeController::class, 'editEmployee'])->name('employees.edit')->middleware(['permission:restaurant_edit']);
            Route::post('/updateEmployee', [RestaurantEmployeeController::class, 'updateEmployee'])->name('employees.update')->middleware(['permission:restaurant_edit']);
            Route::delete('{employee}/deleteEmployee', [RestaurantEmployeeController::class, 'deleteEmployee'])->name('employees.delete')->middleware(['permission:restaurant_edit']);
            Route::match(['get', 'post'], '{restaurant?}/restaurantEmployee', [RestaurantEmployeeController::class, 'indexEmployee'])->name('employees.index')
                ->middleware(['permission:restaurant_edit']);

            Route::get('/addMenuItem', [RestaurantMenuItemController::class, 'createMenuItem'])->name('menuItems.add')->middleware(['permission:restaurant_edit']);
            Route::post('/storeMenuItem', [RestaurantMenuItemController::class, 'storeMenuItem'])->name('menuItems.store')->middleware(['permission:restaurant_edit']);
            Route::get('{menuItem}/editMenuItem', [RestaurantMenuItemController::class, 'editMenuItem'])->name('menuItems.edit')->middleware(['permission:restaurant_edit']);
            Route::post('/updateMenuItem', [RestaurantMenuItemController::class, 'updateMenuItem'])->name('menuItems.update')->middleware(['permission:restaurant_edit']);
            Route::delete('{menuItem}/deleteMenuItem', [RestaurantMenuItemController::class, 'deleteMenuItem'])->name('menuItems.delete')->middleware(['permission:restaurant_edit']);
            Route::match(['get', 'post'], '{restaurant?}/restaurantMenuItem', [RestaurantMenuItemController::class, 'indexMenuItem'])->name('menuItems.index')
                ->middleware(['permission:restaurant_edit']);


            Route::get('/addBranch', [RestaurantBranchController::class, 'createBranch'])->name('branchs.add')->middleware(['permission:restaurant_edit']);
            Route::post('/storeBranch', [RestaurantBranchController::class, 'storeBranch'])->name('branchs.store')->middleware(['permission:restaurant_edit']);
            Route::get('{branch}/editBranch', [RestaurantBranchController::class, 'editBranch'])->name('branchs.edit')->middleware(['permission:restaurant_edit']);
            Route::post('/updateBranch', [RestaurantBranchController::class, 'updateBranch'])->name('branchs.update')->middleware(['permission:restaurant_edit']);
            Route::delete('{branch}/deleteBranch', [RestaurantBranchController::class, 'deleteBranch'])->name('branchs.delete')->middleware(['permission:restaurant_edit']);
            Route::match(['get', 'post'], '{restaurant?}/restaurantBranch', [RestaurantBranchController::class, 'indexBranch'])->name('branchs.index')
                ->middleware(['permission:restaurant_edit']);

            Route::match(['GET', 'POST'], '/{restaurant}/attachments', [RestaurantAttachmentController::class, 'index'])->name('attachments')->middleware(['permission:restaurant_edit']);
            Route::prefix('attachments')->name('attachments.')
                ->middleware(['permission:restaurant_edit'])
                ->group(function () {
                    Route::get('/{restaurant}/create', [RestaurantAttachmentController::class, 'create'])->name('create');
                    Route::post('/{restaurant}/store', [RestaurantAttachmentController::class, 'store'])->name('store');
                    Route::get('/{restaurant}/{attachment}/edit', [RestaurantAttachmentController::class, 'edit'])->name('edit');
                    Route::post('/{restaurant}/{attachment}/update', [RestaurantAttachmentController::class, 'update'])->name('update');
                    Route::delete('/{attachment}/delete', [RestaurantAttachmentController::class, 'delete'])->name('delete');
                });

            Route::get('{restaurant}/sms', [RestaurantController::class, 'viewSMS'])->name('view_sms')
                ->middleware(['permission:restaurant_edit']);
            Route::get('{restaurant}/calls', [RestaurantController::class, 'viewCalls'])->name('view_calls')
                ->middleware(['permission:restaurant_edit']);

            Route::get('{restaurant}/items', [RestaurantController::class, 'viewItems'])->name('view_items')
                ->middleware(['permission:restaurant_edit']);

            Route::get('{restaurant}/viewattachments', [RestaurantController::class, 'viewAttachments'])->name('view_attachments')
                ->middleware(['permission:restaurant_edit']);

            Route::get('{restaurant}/employees', [RestaurantController::class, 'viewEmployees'])->name('view_employees')
                ->middleware(['permission:restaurant_edit']);
            Route::get('{restaurant}/branches', [RestaurantController::class, 'viewBrnaches'])->name('view_brnaches')
                ->middleware(['permission:restaurant_edit']);


            Route::get('{branch}/sms', [RestaurantBranchController::class, 'viewSms'])->name('branch_view_sms')
                ->middleware(['permission:restaurant_edit']);
            Route::get('{branch}/branch_calls', [RestaurantBranchController::class, 'viewCalls'])->name('branch_view_calls')
                ->middleware(['permission:restaurant_edit']);


        });
    Route::prefix('employee')->name('employee.')
        ->group(function () {
            Route::get('employeewhour/checkin', [EmployeeWhourController::class, 'checkIn'])->name('employeewhour.checkin');
            Route::get('employeewhour/checkout', [EmployeeWhourController::class, 'checkOut'])->name('employeewhour.checkout');
            Route::get('employeewhour/getCheckInOut', [EmployeeWhourController::class, 'getCheckInOut'])->name('employeewhour.checkcheckout');

            Route::get('/exportWhour', [EmployeeController::class, 'export'])->name('exportWhour')->middleware(['permission:employee_access']);

            Route::post('/listWhour', [EmployeeController::class, 'listWhour'])->name('listWhour')->middleware(['permission:employee_access']);

        });
    Route::prefix('captins')->name('captins.')
        ->group(function () {
            Route::get('/export', [CaptinController::class, 'export'])->name('export')->middleware(['permission:captin_access']);
            Route::get('/getCitiesForSelectedCountry/{country}', [CountryCityController::class, 'getCountryCities'])->name('getCountryCities');
            Route::match(['get', 'post'], '/', [CaptinController::class, 'index'])->name('index')
                ->middleware(['permission:captin_access']);
            Route::get('/getByTelephone/{telephone}', [CaptinController::class, 'getByTelephone'])->name('getByTelephone');

            Route::get('/create', [CaptinController::class, 'create'])->name('create')->middleware(['permission:captin_add']);
            Route::post('/store', [CaptinController::class, 'store'])->name('store')->middleware(['permission:captin_add']);
            Route::get('/{captin}/edit', [CaptinController::class, 'edit'])->name('edit')->middleware(['permission:captin_edit']);
            Route::post('{captin}/update', [CaptinController::class, 'update'])->name('update')->middleware(['permission:captin_edit']);
            Route::delete('{captin}/delete', [CaptinController::class, 'delete'])->name('delete')->middleware(['permission:captin_delete']);
            Route::post('/Captin/{Id?}', [CaptinController::class, 'Captin'])->name('addedit')
                ->middleware(['permission:captin_add']);
            Route::match(['GET', 'POST'], '/{captin}/attachments', [CaptinAttachmentController::class, 'index'])->name('attachments')->middleware(['permission:captin_edit']);
            Route::prefix('attachments')->name('attachments.')
                ->middleware(['permission:captin_edit'])
                ->group(function () {
                    Route::get('/{captin}/create', [CaptinAttachmentController::class, 'create'])->name('create');
                    Route::post('/{captin}/store', [CaptinAttachmentController::class, 'store'])->name('store');
                    Route::get('/{captin}/{attachment}/edit', [CaptinAttachmentController::class, 'edit'])->name('edit');
                    Route::post('/{captin}/{attachment}/update', [CaptinAttachmentController::class, 'update'])->name('update');
                    Route::delete('/{attachment}/delete', [CaptinAttachmentController::class, 'delete'])->name('delete');
                });
            Route::get('{captin}/captin_calls', [CaptinController::class, 'viewCalls'])->name('view_calls')
                ->middleware(['permission:captin_edit']);
            Route::get('{captin}/viewattachments', [CaptinController::class, 'viewAttachments'])->name('view_attachments')
                ->middleware(['permission:captin_edit']);

        });


    Route::prefix('client_calls_actions')->name('client_calls_actions.')
        ->group(function () {
            Route::get('/export', [CallsController::class, 'export'])->name('export')->middleware(['permission:calls_module_access']);
            Route::match(['get', 'post'], '/', [CallsController::class, 'index'])->name('index')
                ->middleware(['permission:calls_module_access']);
            Route::get('/create', [CallsController::class, 'create'])->name('create')->middleware(['permission:calls_module_add']);
            Route::get('/updateCalls', [CdrController::class, 'updateCalls'])->name('updateCalls')->middleware(['permission:calls_module_add']);
            Route::post('/ClientCall/{Id?}', [CallsController::class, 'ClientCall'])->name('ClientCall')->middleware(['permission:calls_module_add']);
            Route::get('/assign/{call}', [CallsController::class, 'Assign'])->name('assign')->middleware(['permission:calls_module_add']);
            Route::post('/storeAssign/{call}', [CallsController::class, 'storeAssign'])->name('storeAssign')->middleware(['permission:calls_module_add']);            // Route::get('/{clientCallAction}/edit', [CallsController::class, 'edit'])->name('edit')->middleware(['permission:calls_module_edit']);
            // Route::post('{clientCallAction}/update', [CallsController::class, 'update'])->name('update')->middleware(['permission:calls_module_edit']);
            Route::delete('{clientCallAction}/delete', [CallsController::class, 'delete'])->name('delete')->middleware(['permission:calls_module_delete']);
        });
    Route::prefix('call_tasks')->name('call_tasks.')
        ->group(function () {
            Route::get('/export', [CallTaskController::class, 'export'])->name('export')->middleware(['permission:callTasks_module_access']);
            Route::match(['get', 'post'], '/', [CallTaskController::class, 'index'])->name('index')
                ->middleware(['permission:callTasks_module_access']);
            Route::get('/create', [CallTaskController::class, 'create'])->name('create')->middleware(['permission:callTasks_module_add']);
            Route::get('/updateCalls', [CdrController::class, 'updateCalls'])->name('updateCalls')->middleware(['permission:callTasks_module_add']);
            Route::post('/ClientCall/{Id?}', [CallTaskController::class, 'ClientCall'])->name('ClientCall')->middleware(['permission:callTasks_module_add']);
            Route::get('/action/{call}', [CallTaskController::class, 'Action'])->name('action')->middleware(['permission:callTasks_module_add']);
            Route::post('/storeAction/{call}', [CallTaskController::class, 'storeAction'])->name('storeAction')->middleware(['permission:callTasks_module_add']);            // Route::get('/{clientCallAction}/edit', [CallTaskController::class, 'edit'])->name('edit')->middleware(['permission:callTasks_module_edit']);
            // Route::post('{clientCallAction}/update', [CallTaskController::class, 'update'])->name('update')->middleware(['permission:callTasks_module_edit']);
            Route::delete('{call}/delete', [CallTaskController::class, 'delete'])->name('delete')->middleware(['permission:callTasks_module_delete']);
        });

    Route::prefix('cdr')->name('cdr.')
        ->group(function () {
            Route::match(['get', 'post'], '/', [CdrController::class, 'index'])->name('index')
                ->middleware(['permission:cdr_access']);
            Route::match(['get', 'post'], '/{telephone}/indexHistory', [CdrController::class, 'indexHistory'])->name('indexHistory')
                ->middleware(['permission:cdr_access']);
        });

    Route::prefix('calls')->name('calls.')
        ->group(function () {
            Route::get('/{captin}/calls', [CaptinCallController::class, 'view_captins_calls'])->name('captin.view_captins_calls')
                ->middleware(['permission:captin_call_access']);
            Route::get('/{captin}/create', [CaptinCallController::class, 'create'])->name('captin.create')
                ->middleware(['permission:captin_call_add']);
            Route::post('/{captin}/store', [CaptinCallController::class, 'store'])->name('captin.store')
                ->middleware(['permission:captin_call_add']);
            Route::get('/{captin}/{call}/edit', [CaptinCallController::class, 'edit'])->name('captin.edit')
                ->middleware(['permission:captin_call_edit']);
            Route::post('/{captin}/{call}/update', [CaptinCallController::class, 'update'])->name('captin.update')
                ->middleware(['permission:captin_call_edit']);
            Route::delete('/{call}/delete', [CaptinCallController::class, 'delete'])->name('captin.delete')
                ->middleware(['permission:captin_call_delete']);

            Route::get('/{call}/questionnaireResponses', [CaptinCallController::class, 'view_call_questionnaire_responses'])->name('captin.view_call_questionnaire_responses')
                ->middleware(['permission:captin_call_access']);


            Route::get('/{callTask}/callCallsTask', [CallTasksCallController::class, 'view_callTasks_calls'])->name('callTask.view_calls')
                ->middleware(['permission:callTasks_module_access']);
            Route::get('/{callTask}/createCallsCallsTask', [CallTasksCallController::class, 'create'])->name('callTask.create')
                ->middleware(['permission:callTasks_module_add']);
            Route::post('/{callTask}/storeCallsCallsTask', [CallTasksCallController::class, 'store'])->name('callTask.store')
                ->middleware(['permission:callTasks_module_add']);
            Route::get('/{callTask}/{call}/editCallsCallsTask', [CallTasksCallController::class, 'edit'])->name('callTask.edit')
                ->middleware(['permission:callTasks_module_edit']);
            Route::post('/{callTask}/{call}/CallsupdateCallsTask', [CallTasksCallController::class, 'update'])->name('callTask.update')
                ->middleware(['permission:callTasks_module_edit']);
            Route::delete('/{callTask}/deleteCallsCallsTask', [CallTasksCallController::class, 'delete'])->name('callTask.delete')
                ->middleware(['permission:callTasks_module_delete']);

            Route::get('/{callTask}/questionnaireResponsesCallsCallsTask', [CallTasksCallController::class, 'view_call_questionnaire_responses'])->name('callTask.view_call_questionnaire_responses')
                ->middleware(['permission:callTasks_module_access']);

        });

    Route::prefix('sms')->name('sms.')
        ->group(function () {
            Route::get('{captin}/sms', [CaptinSMSController::class, 'view_captins_sms'])->name('captin.view_captins_sms')
                ->middleware(['permission:captin_sms_access']);
            Route::get('/{captin}/create', [CaptinSMSController::class, 'create'])->name('captin.create')
                ->middleware(['permission:captin_sms_add']);
            Route::post('/{captin}/store', [CaptinSMSController::class, 'store'])->name('captin.store')
                ->middleware(['permission:captin_sms_add']);

            Route::get('{callTask}/smsCallTask', [CallTaskSMSController::class, 'view_callTasks_sms'])->name('callTask.view_callTasks_sms')
                ->middleware(['permission:callTask_sms_access']);
            Route::get('/{callTask}/createCallTask', [CallTaskSMSController::class, 'create'])->name('callTask.create')
                ->middleware(['permission:callTask_sms_add']);
            Route::post('/{callTask}/storeCallTask', [CallTaskSMSController::class, 'store'])->name('callTask.store')
                ->middleware(['permission:callTask_sms_add']);

        });

    Route::prefix('dashboard')->name('dashboard.')
        ->group(function () {
            Route::get('/employee', [DashboardController::class, 'employee'])->name('employee')->middleware(['permission:employee_access']);
        });
    // Route::prefix('procedures')->name('procedures.')
    //     ->group(function () {
    //     });


});
