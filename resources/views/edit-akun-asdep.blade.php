@extends('layouts/app')

@section('title','Edit Akun Asdep')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Edit Akun Asdep</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="name">Nama *</label>
					<input class="form-control" id="name" />
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
	<script>const id = {{$id}}</script>
	<script src="{{asset('api/edit-akun-asdep.js')}}"></script>
@endsection