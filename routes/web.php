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
	Route::get('notification', function () {
		return view('notification');
	});
	Route::get('ubah-password', function () {
		return view('ubah-password');
	});

	// Akun Asdep
	Route::get('akun-asdep', function () {
		return view('akun-asdep');
	});
	Route::get('akun-asdep/create', function () {
		return view('create-akun-asdep');
	});
	Route::get('akun-asdep/edit/{id}', function ($id) {
		return view('edit-akun-asdep', compact('id'));
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
	Route::get('program/{parent_id}', function ($parent_id) {
		return view('kegiatan', compact('parent_id'));
	});
	Route::get('kegiatan/create/{parent_id}', function ($parent_id) {
		return view('create-kegiatan', compact('parent_id'));
	});
	Route::get('kegiatan/edit/{id}', function ($id) {
		return view('edit-kegiatan', compact('id'));
	});

	// Rancangan Anggaran
	Route::get('rancangan-anggaran', function () {
		return view('rancangan-anggaran');
	});
	Route::get('rancangan-anggaran/create', function () {
		return view('create-rancangan-anggaran');
	});
	Route::get('rancangan-anggaran/{id}', function ($id) {
		return view('detail-rancangan-anggaran', compact('id'));
	});
	Route::get('rancangan-anggaran/edit/{id}', function ($id) {
		return view('edit-rancangan-anggaran', compact('id'));
	});
});