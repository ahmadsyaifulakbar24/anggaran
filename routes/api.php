<?php

use Illuminate\Support\Facades\Route;

Route::namespace('API')->group(function () {
    Route::post('auth/login', 'Auth\LoginController');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::namespace('Param')->group(function() {
            Route::get('province', 'GetParamController@provinsi');
            Route::get('city', 'GetParamController@city');
            Route::prefix('param')->group(function() {
                Route::get('target', 'GetParamController@target');
                Route::get('indicator', 'GetParamController@indicator');
                Route::get('sources_of_funding', 'GetParamController@sources_of_funding');
                Route::get('units', 'GetParamController@units');
            });
        });
        
        Route::namespace('Auth')->prefix('auth')->group(function () {
            Route::post('/logout', 'LogoutController');
            Route::get('/user', 'UserController@fetch');
        });

        Route::namespace('Program')->prefix('program')->group(function() {
            Route::post('/', 'CreateProgramController');
            Route::get('/', 'GetProgramController@fetch');
            Route::get('/get_parent', 'GetProgramController@parent');
            Route::PUT('/{program:id}', 'UpdateProgramController');
            Route::delete('/{program:id}', 'DeleteProgramController');
        });

        Route::namespace('Kro')->prefix('kro')->group(function() {
            Route::get('/', 'KroController@fetch');
        });

        Route::namespace('UnitTarget')->prefix('unit_target')->group(function() {
            Route::get('/', 'UnitTargetController@fetch');
        });
     
        Route::namespace('WorkPlan')->group(function() {
            Route::prefix('user_program')->group(function() {
                Route::post('/create', 'UserProgramController@create');
                Route::get('/fetch', 'UserProgramController@fetch');
                Route::put('/update/{user_program:id}', 'UserProgramController@update');
                Route::delete('/delete/{user_program:id}', 'UserProgramController@delete');
            });

            Route::prefix('user_activity')->group(function() {
                Route::post('/create', 'UserActivityController@create');
                Route::get('/fetch', 'UserActivityController@fetch');
                Route::put('/update/{user_activity:id}', 'UserActivityController@update');
                Route::delete('/delete/{user_activity:id}', 'UserActivityController@delete');
            });

            Route::prefix('user_kro')->group(function() {
                Route::post('/create', 'UserKroController@create');
                Route::get('/fetch', 'UserKroController@fetch');
                Route::put('/update/{user_kro:id}', 'UserKroController@update');
                Route::delete('/delete/{user_kro:id}', 'UserKroController@delete');
            });

            Route::prefix('user_ro')->group(function() {
                Route::post('/create', 'UserRoController@create');
                Route::get('/fetch', 'UserRoController@fetch');
                Route::put('/update/{user_ro:id}', 'UserRoController@update');
                Route::delete('/delete/{user_ro:id}', 'UserRoController@delete');
            });
        });

        Route::namespace('WorkPlan')->prefix('work_plan')->group(function() {
            Route::post('/', 'CreateWorkPlanController');
            Route::get('/', 'GetWorkPlanController@fetch');
            Route::get('/excel_data', 'GetWorkPlanController@excel');
            Route::patch('/{work_plan:id}', 'UpdateWorkPlanController');
            Route::delete('/{work_plan:id}', 'DeleteWorkPlanController');
            Route::post('/status/{work_plan:id}', 'StatusController@status');

            Route::post('/upload_file', 'FileManagerController@create');
            Route::get('/get_file', 'FileManagerController@fetch');
            Route::delete('/delete_file/{file_manager:id}', 'FileManagerController@delete');
            Route::delete('/delete_file/{file_manager:id}', 'FileManagerController@delete');

            Route::get('/total_budged', 'GetTotalBudgedController@totalBudget');
            Route::get('/total_budged_by_province', 'GetTotalBudgedController@totalBudgetByProvince');
            Route::get('/total_budged_by_indicator_target', 'GetTotalBudgedController@total_budged_by_indicator_target');
            Route::get('/get_by_province', 'GetWorkPlanController@get_by_province');
            Route::get('/get_by_indicator_target', 'GetWorkPlanController@get_by_indicator_target');
            Route::get('/get_by_pph7', 'GetWorkPlanController@get_by_pph7');

            Route::get('/breadcrumb', 'BreadcrumbController');

            Route::post('/lock', 'LockUnlockController@lock');
            Route::post('/unlock', 'LockUnlockController@unlock');
            
        });

        Route::namespace('Comment')->prefix('comment')->group(function() {
            Route::post('/', 'CommentController@create');
        });

        Route::namespace('User')->prefix('user')->group(function() {
            Route::post('add_asdep', 'CreateUserController@user_asdep');
            Route::post('reset_password', 'ResetPasswordController');
            Route::patch('update/{user:id}', 'UpdateUserController@update_data');
            Route::patch('reset_password/{user:id}', 'UpdateUserController@reset_password');
            Route::delete('delete/{user:id}', 'DeleteUserController');
            Route::get('/', 'GetUserController@fetch');
        });

        Route::namespace('Notification')->prefix('notification')->group(function() {
            Route::get('/', 'GetNotificationController@fetch');
            Route::patch('/read/{notification:id}', 'UpdateNotificationController@read');
        });

        Route::namespace('Dashboard')->prefix('dashboard')->group(function() {
            Route::get('budget_statistics', 'DashboardController@budget_statistics');
        });

        Route::namespace('AdminSetting')->prefix('admin_setting')->group(function() {
            Route::post('/create', 'AdminSettingController@create_message');
            Route::get('/fetch', 'AdminSettingController@get_message');
        });
    });
});