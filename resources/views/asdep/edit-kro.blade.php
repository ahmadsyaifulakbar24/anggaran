@extends('layouts/app')

@section('title', 'Ubah KRO')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Ubah KRO</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="type_kro">Tipe KRO</label>
					<select class="custom-select" id="type_kro" role="button">
						<option value="" disabled selected>Pilih</option>
						<option value="pn">Prioritas Nasional</option>
						<option value="non_pn">Non Prioritas Nasional</option>
					</select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="kro_id">KRO</label>
					<select class="custom-select" id="kro_id" role="button">
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
	<script>const user_activity_id = {{$user_activity_id}}</script>
	<script>const user_kro_id = {{$user_kro_id}}</script>
	<script src="{{asset('api/asdep/edit-kro.js')}}"></script>
@endsection