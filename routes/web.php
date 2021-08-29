<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('session/login', [SessionController::class, 'createSession']);
Route::get('session/logout', [SessionController::class, 'deleteSession']);

Route::group(['middleware'=>['afterMiddleware']], function () {
	Route::get('/', function () {
		return redirect('login');
	});
	Route::get('login', function () {
		return view('auth/login');
	});
});

Route::group(['middleware'=>['beforeMiddleware']], function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	});
	Route::get('akun-asdep', function () {
		return view('akun-asdep');
	});
	Route::get('program', function () {
		return view('program');
	});
	Route::get('kegiatan', function () {
		return view('kegiatan');
	});
	Route::get('rancangan-anggaran', function () {
		return view('rancangan-anggaran');
	});
});