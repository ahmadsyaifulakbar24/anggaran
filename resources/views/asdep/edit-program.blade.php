@extends('layouts/app')

@section('title', 'Ubah Program')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Ubah Program</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="program_id">Program</label>
					<select class="custom-select" id="program_id" role="button">
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
	<script src="{{asset('api/asdep/edit-program.js')}}"></script>
@endsection