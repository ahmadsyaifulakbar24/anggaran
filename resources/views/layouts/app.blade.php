<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - Penganggaran</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="{{asset('assets/images/icon.ico')}}">
	@yield('style')
</head>
<body>
	@if(!Request::is('daftar/*'))
    <nav class="navbar navbar-expand-sm navbar-dark border-bottom" style="background: #0fa9f9;">
    	<div class="container">
	        <div class="form-inline">
	            <!-- <i class="mdi mdi-menu mdi-24px d-block d-lg-none pointer text-dark mr-2" id="menu"></i> -->
	            <a class="navbar-brand" href="{{url('dashboard')}}">Penganggaran
					<!-- <img src="{{asset('assets/images/logo.png')}}" width="120" class="d-inline-block align-top mr-2" alt="Logo" loading="lazy"> -->
	            </a>
	        </div>
	        <div class="dropdown ml-auto align-items-center d-flex">
	        	<a href="{{url('notification')}}" class="text-dark mr-3">
		            <i class="mdi mdi-24px mdi-bell text-white pr-0"></i>
		            <span class="badge badge-pill badge-danger position-absolute py-1" id="notification" style="right: 35px"></span>
		        </a>
	            <a id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            	<img class="avatar rounded-circle" width="25">
	            </a>
	            <div class="dropdown-menu dropdown-menu-right rounded border-0" aria-labelledby="dropdownMenu">
	            	<div class="text-center my-3 px-3 text-break">
		            	<img class="avatar rounded-circle" width="75">
		            	<h6 class="name pt-3 mb-0"></h6>
		            	<small class="level text-secondary"></small>
		            </div>
		            <div class="dropdown-divider"></div>
	                <a href="{{url('ubah-password')}}" class="dropdown-item" role="button">
	                    <i class="mdi mdi-18px mdi-lock-outline"></i><span>Ubah password</span>
	                </a>
	                <a href="javascript:void(0)" class="dropdown-item" onclick="return logout()" role="button">
	                    <i class="mdi mdi-18px mdi-login-variant"></i><span>Logout</span>
	                </a>
	            </div>
	        </div>
	    </div>
    </nav>
    <div class="bg-light">
		<div class="container pt-5">
			@if(Request::is('dashboard'))
			<div class="pt-4">
				<h4>Halo, <span class="name"></span></h4>
				<h6>Aplikasi Perencanaan dan Anggaran</h6>
				<h6>Kementerian Koperasi dan UKM RI - Tahun 2022</h6>
			</div>
			@endif
			<div class="row justify-content-md-center pt-4">
				<div class="col col-md-4 col-lg-2 mb-4">
					<a href="{{url('dashboard')}}" class="card card-menu rounded {{Request::is('dashboard')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-home-outline mdi-48px pr-0"></i>
							<h6>Dashboard</h6>
						</div>
					</a>
				</div>
				@if(session("role") == "deputi")
				<div class="col col-md-4 col-lg-2 mb-4 px-0 px-sm-3">
					<a href="{{url('akun-asdep')}}" class="card card-menu rounded {{Request::is('akun-asdep')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-account-multiple-outline mdi-48px pr-0"></i>
							<h6>Akun Asdep</h6>
						</div>
					</a>
				</div>
				@endif
				@if(session("role") == "admin")
				<div class="col col-md-4 col-lg-2 mb-4 px-0 px-sm-3">
					<a href="{{url('program')}}" class="card card-menu rounded {{Request::is('program')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-file-document-outline mdi-48px pr-0"></i>
							<h6>Program</h6>
						</div>
					</a>
				</div>
				@endif
				<div class="col col-md-4 col-lg-2 mb-4">
					<a href="{{url('rancangan-anggaran')}}" class="card card-menu rounded {{Request::is('rancangan-anggaran')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-file-document-edit-outline mdi-48px pr-0"></i>
							<h6>Rancangan Anggaran</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="overlay"></div>
	<div class="main">@yield('content')</div>
	<div class="customAlert d-flex align-items-center small"></div>
	@include('layouts.partials.script')
	@yield('script')
</body>
</html>