<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace('API')->group(function () {
    Route::post('auth/login', 'Auth\LoginController');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::namespace('Param')->group(function() {
            Route::get('province', 'GetParamController@provinsi');
            Route::get('city', 'GetParamController@city');
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
        });

        Route::namespace('Comment')->prefix('comment')->group(function() {
            Route::post('/', 'CommentController@create');
        });

        Route::namespace('Kro')->prefix('kro')->group(function() {
            Route::get('/', 'KroController@fetch');
        });

        Route::namespace('Ro')->prefix('ro')->group(function() {
            Route::get('/', 'RoController@fetch');
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
    });
});