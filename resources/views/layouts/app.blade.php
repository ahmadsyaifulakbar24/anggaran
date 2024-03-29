<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/scss/custom.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="{{asset('assets/images/icon.ico')}}">
	@yield('style')
</head>
<body>
	@if(!Request::is('daftar/*'))
    <nav class="navbar navbar-expand-sm navbar-dark border-bottom bg-primary">
    	<div class="container">
	        <div class="form-inline">
	            <!-- <i class="mdi mdi-menu mdi-24px d-block d-lg-none pointer text-dark mr-2" id="menu"></i> -->
	            <a class="navbar-brand" href="{{url('dashboard')}}">
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
	                    <i class="mdi mdi-18px mdi-lock-outline"></i><span>Ubah Password</span>
	                </a>
	                <a href="javascript:void(0)" class="dropdown-item" onclick="return logout()" role="button">
	                    <i class="mdi mdi-18px mdi-login-variant"></i><span>Logout</span>
	                </a>
	            </div>
	        </div>
	    </div>
    </nav>
    <div class="bg-light">
		<div class="container">
			@if(Request::is('dashboard'))
			<div class="pt-4">
				<h4>Halo, <span class="name"></span></h4>
				<h6>Aplikasi Perencanaan dan Anggaran</h6>
				<h6>Kementerian Koperasi dan UKM RI - Tahun 2022</h6>
			</div>
			@endif
			<div class="row justify-content-md-center pt-4">
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
					<a href="{{url('dashboard')}}" class="card card-menu {{Request::is('dashboard')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-home-outline mdi-48px pr-0"></i>
							<h6>Dashboard</h6>
						</div>
					</a>
				</div>
				@if(session("role") == "deputi")
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
					<a href="{{url('akun-asdep')}}" class="card card-menu {{Request::is('akun-asdep')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-account-multiple-outline mdi-48px pr-0"></i>
							<h6>Akun Asdep</h6>
						</div>
					</a>
				</div>
				@endif
				@if(session("role") == "admin")
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
					<a href="{{url('program')}}" class="card card-menu {{Request::is('program') || Request::is('kegiatan/*')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-file-document-outline mdi-48px pr-0"></i>
							<h6>Setting Program</h6>
						</div>
					</a>
				</div>
				@endif
            	@if(session("role") == "asdep")
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
               		<a href="{{url('asdep/program')}}" class="card card-menu {{Request::segment(1) == 'asdep'?'active':''}}">
                  		<div class="text-center p-2">
                     		<i class="mdi mdi-file-document-outline mdi-48px pr-0"></i>
							<h6>Entri Komponen</h6>
						</div>
					</a>
				</div>
				@endif
            	@if(session("role") != "asdep")
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
               		<a href="{{url('asdep/program')}}" class="card card-menu {{Request::segment(1) == 'asdep'?'active':''}}">
                  		<div class="text-center p-2">
                     		<i class="mdi mdi-file-document-outline mdi-48px pr-0"></i>
							<h6>Data Komponen</h6>
						</div>
					</a>
				</div>
            	@endif
				<div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
					<a href="{{url('status-rekap-anggaran')}}" class="card card-menu {{Request::is('status-rekap-anggaran')?'active':''}}">
						<div class="text-center p-2">
							<i class="mdi mdi-file-excel-outline mdi-48px pr-0"></i>
							<h6>Status & Rekap Anggaran</h6>
						</div>
					</a>
				</div>
			</div>
			@if(session("role") == "admin" && Request::is('dashboard'))
			<div class="text-center py-2">
				<div class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-lock">Lock Semua Komponen</div>
				<div class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#modal-unlock">Unlock Semua Komponen</div>
			</div>
			@endif
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