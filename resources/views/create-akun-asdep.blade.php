@extends('layouts/app')

@section('title','Buat Akun Asdep')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Buat Akun Asdep</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="name">Nama</label>
					<input class="form-control" id="name"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" id="username"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group position-relative">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control pr-5" maxlength="32" autocomplete="on">
					<i class="password mdi mdi-eye-off mdi-18px" data-id="password"></i>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group position-relative">
					<label for="cpassword">Konfirmasi Password</label>
					<input type="password" id="cpassword" class="form-control pr-5" maxlength="32" autocomplete="on">
					<i class="password mdi mdi-eye-off mdi-18px" data-id="cpassword"></i>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" id="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/create-akun-asdep.js')}}"></script>
@endsection