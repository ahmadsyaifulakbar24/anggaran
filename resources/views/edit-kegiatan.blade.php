@extends('layouts/app')

@section('title', 'Ubah Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Ubah Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="code_program">Kode *</label>
					<input class="form-control" id="code_program" />
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="description">Keterangan *</label>
					<input class="form-control" id="description" />
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" id="submit" disabled>Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = {{$id}}</script>
	<script src="{{asset('api/edit-kegiatan.js')}}"></script>
@endsection