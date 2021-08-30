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
	Route::get('akun-asdep/create', function () {
		return view('create-akun-asdep');
	});

	Route::get('program', function () {
		return view('program');
	});
	Route::get('program/create/{type}/{id}', function ($type, $id) {
		return view('create-program', compact('type', 'id'));
	});
	Route::get('program/{sub_program}', function ($sub_program) {
		return view('sub-program', compact('sub_program'));
	});
	Route::get('program/{sub_program}/{kode_program}', function ($sub_program, $kode_program) {
		return view('kode-program', compact('sub_program', 'kode_program'));
	});
	Route::get('program/{sub_program}/{kode_program}/{kode_kegiatan}', function ($sub_program, $kode_program, $kode_kegiatan) {
		return view('kode-kegiatan', compact('sub_program', 'kode_program', 'kode_kegiatan'));
	});

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