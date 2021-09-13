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
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" id="username"></select>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password"></select>
				</div>
				<div class="form-group">
					<label for="password_confirmation">Konfirmasi Password</label>
					<input type="password" class="form-control" id="password_confirmation"></select>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/create-akun-asdep.js')}}"></script> -->
@endsection