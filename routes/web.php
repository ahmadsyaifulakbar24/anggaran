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

	// Akun Asdep
	Route::get('akun-asdep', function () {
		return view('akun-asdep');
	});
	Route::get('akun-asdep/create', function () {
		return view('create-akun-asdep');
	});

	// Program
	Route::get('program', function () {
		return view('program');
	});
	Route::get('program/create', function () {
		return view('create-program');
	});
	Route::get('program/edit/{id}', function ($id) {
		return view('edit-program', compact('id'));
	});

	// Kegiatan
	Route::get('program/{id_program}', function ($id_program) {
		return view('kegiatan', compact('id_program'));
	});
	Route::get('kegiatan/create/{id_program}', function ($id_program) {
		return view('create-kegiatan', compact('id_program'));
	});

	// Rancangan Anggaran
	Route::get('rancangan-anggaran', function () {
		return view('rancangan-anggaran');
	});
	Route::get('rancangan-anggaran/create', function () {
		return view('create-rancangan-anggaran');
	});
	Route::get('rancangan-anggaran/{id}', function ($id) {
		return view('view-rancangan-anggaran', compact('id'));
	});
});