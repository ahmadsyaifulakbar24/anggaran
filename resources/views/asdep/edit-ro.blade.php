@extends('layouts/app')

@section('title', 'Ubah RO')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Ubah RO</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="code_ro">Kode RO *</label>
					<input class="form-control" id="code_ro">
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="ro">Nama RO *</label>
					<input class="form-control" id="ro">
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="unit_target">Satuan RO *</label>
					<select class="custom-select" id="unit_target" role="button">
						<option value="" disabled selected>Pilih</option>
					</select>
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
	<script>const user_kro_id = {{$user_kro_id}}</script>
	<script>const user_ro_id = {{$user_ro_id}}</script>
	<script src="{{asset('api/asdep/edit-ro.js')}}"></script>
@endsection