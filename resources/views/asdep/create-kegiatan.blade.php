@extends('layouts/app')

@section('title', 'Buat Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Buat Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="activity_id">Kegiatan *</label>
					<select class="custom-select" id="activity_id" role="button">
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
	<script>const user_program_id = {{$user_program_id}}</script>
	<script src="{{asset('api/asdep/create-kegiatan.js')}}"></script>
@endsection