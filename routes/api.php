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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('API')->group(function () {
    Route::post('auth/login', 'Auth\LoginController');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::namespace('Auth')->prefix('auth')->group(function () {
            Route::post('/logout', 'LogoutController');
            Route::get('/user', 'UserController@fetch');
        });

        Route::namespace('Program')->prefix('program')->group(function() {
            Route::post('/', 'CreateProgramController');
            Route::get('/', 'GetProgramController@fetch');
            Route::patch('/{program:id}', 'UpdateProgramController');
            Route::delete('/{program:id}', 'DeleteProgramController');
        });

        Route::namespace('WorkPlan')->prefix('work_plan')->group(function() {
            Route::post('/', 'CreateWorkPlanController');
            Route::get('/', 'GetWorkPlanController@fetch');
            Route::patch('/{work_plan:id}', 'UpdateWorkPlanController');
            Route::delete('/{work_plan:id}', 'DeleteWorkPlanController');
        });
    });
});