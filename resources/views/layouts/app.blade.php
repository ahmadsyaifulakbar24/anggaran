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
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <div class="form-inline">
            <i class="mdi mdi-menu mdi-24px d-block d-lg-none pointer text-dark mr-2" id="menu"></i>
            <a class="navbar-brand d-none d-lg-block" href="{{url('dashboard')}}">Penganggaran
				<!-- <img src="{{asset('assets/images/logo.png')}}" width="120" class="d-inline-block align-top mr-2" alt="Logo" loading="lazy"> -->
            </a>
        </div>
        <div class="dropdown ml-auto">
            <a id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	<img src="{{asset('assets/images/user.png')}}" class="avatar rounded-circle border" width="25">
            </a>
            <div class="dropdown-menu dropdown-menu-right rounded border-0" aria-labelledby="dropdownMenu">
            	<div class="text-center my-3 px-3 text-break">
	            	<img src="{{asset('assets/images/user.png')}}" class="avatar rounded-circle" width="75">
	            	<h6 class="name text-truncate pt-3 mb-0"></h6>
	            	<small class="level text-secondary"></small>
	            </div>
	            <div class="dropdown-divider"></div>
                <!-- <a href="{{url('password')}}" class="dropdown-item" role="button">
                    <i class="mdi mdi-18px mdi-lock-outline"></i><span>Ubah password</span>
                </a> -->
                <a href="javascript:void(0)" class="dropdown-item" onclick="return logout()" role="button">
                    <i class="mdi mdi-18px mdi-login-variant"></i><span>Logout</span>
                </a>
            </div>
        </div>
    </nav>
	<div class="sidebar">
		<div class="py-2 pl-3 border-bottom">
			<div class="py-2">Penganggaran</div>
			<!-- <img src="{{asset('assets/images/logo.png')}}" width="120" class="d-inline-block align-top mr-2" alt="Logo" loading="lazy"> -->
		</div>
		<small class="text-secondary text-uppercase font-weight-bold">Menu</small>
        <a href="{{url('dashboard')}}" class="{{Request::is('dashboard')?'active':''}}">
            <i class="mdi mdi-apps mdi-18px"></i><span>Dashboard</span>
        </a>
        @if(session("role") == "deputi")
        <a href="{{url('akun-asdep')}}" class="{{Request::is('akun-asdep')?'active':''}}">
            <i class="mdi mdi-apps mdi-18px"></i><span>Buat Akun Asdep</span>
        </a>
        @endif
        @if(session("role") == "admin" || session("role") == "deputi")
        <a href="{{url('program')}}" class="{{Request::is('program')?'active':''}}">
            <i class="mdi mdi-apps mdi-18px"></i><span>Program</span>
        </a>
        @endif
        <a href="{{url('rancangan-anggaran')}}" class="{{Request::is('rancangan-anggaran')?'active':''}}">
            <i class="mdi mdi-apps mdi-18px"></i><span>Rancangan Anggaran</span>
        </a>
		<small class="text-secondary" style="position:absolute;bottom:5px">2022 &copy; Penganggaran - Kementerian Koperasi dan UKM RI</small>
	</div>
	@endif
	<div class="overlay"></div>
	<div class="main">
		@yield('content')
	</div>
	<div class="customAlert d-flex align-items-center small"></div>
	@include('layouts.partials.script')
	@yield('script')
</body>
</html>