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
	Route::get('kegiatan/{parent_id}', function ($parent_id) {
		return view('kegiatan', compact('parent_id'));
	});
	Route::get('kegiatan/create/{parent_id}', function ($parent_id) {
		return view('create-kegiatan', compact('parent_id'));
	});
	Route::get('kegiatan/edit/{id}', function ($id) {
		return view('edit-kegiatan', compact('id'));
	});


	// Asdep Program
	Route::get('asdep/program', function () {
		return view('asdep/program');
	});
	Route::get('asdep/program/create', function () {
		return view('asdep/create-program');
	});
	Route::get('asdep/program/edit/{user_program_id}', function ($user_program_id) {
		return view('asdep/edit-program', compact('user_program_id'));
	});

	// Asdep Kegiatan
	Route::get('asdep/kegiatan/{user_program_id}', function ($user_program_id) {
		return view('asdep/kegiatan', compact('user_program_id'));
	});
	Route::get('asdep/kegiatan/create/{user_program_id}', function ($user_program_id) {
		return view('asdep/create-kegiatan', compact('user_program_id'));
	});
	Route::get('asdep/kegiatan/edit/{user_activity_id}', function ($user_activity_id) {
		return view('asdep/edit-kegiatan', compact('user_activity_id'));
	});

	// Asdep KRO
	Route::get('asdep/kro/{user_activity_id}', function ($user_activity_id) {
		return view('asdep/kro', compact('user_activity_id'));
	});
	Route::get('asdep/kro/create/{user_activity_id}', function ($user_activity_id) {
		return view('asdep/create-kro', compact('user_activity_id'));
	});
	Route::get('asdep/kro/edit/{user_activity_id}/{user_kro_id}', function ($user_activity_id, $user_kro_id) {
		return view('asdep/edit-kro', compact('user_activity_id', 'user_kro_id'));
	});

	// Asdep RO
	Route::get('asdep/ro/{user_kro_id}', function ($user_kro_id) {
		return view('asdep/ro', compact('user_kro_id'));
	});
	Route::get('asdep/ro/create/{user_kro_id}', function ($user_kro_id) {
		return view('asdep/create-ro', compact('user_kro_id'));
	});
	Route::get('asdep/ro/edit/{user_kro_id}/{user_ro_id}', function ($user_kro_id, $user_ro_id) {
		return view('asdep/edit-ro', compact('user_kro_id', 'user_ro_id'));
	});

	// Asdep Komponen
	Route::get('asdep/komponen/{user_ro_id}', function ($user_ro_id) {
		return view('asdep/komponen', compact('user_ro_id'));
	});
	Route::get('asdep/komponen/create/{user_ro_id}', function ($user_ro_id) {
		return view('asdep/create-komponen', compact('user_ro_id'));
	});
	Route::get('asdep/komponen/edit/{user_ro_id}/{id}', function ($user_ro_id, $id) {
		return view('asdep/edit-komponen', compact('user_ro_id', 'id'));
	});
	Route::get('asdep/komponen/detail/{id}', function ($id) {
		return view('asdep/detail-komponen', compact('id'));
	});


	// Status & Rekap Anggaran
	Route::get('status-rekap-anggaran', function () {
		return view('status-rekap-anggaran');
	});


	// Rancangan Anggaran
	Route::get('rancangan-anggaran', function () {
		return view('rancangan-anggaran');
	});
});