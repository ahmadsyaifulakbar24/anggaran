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
					<label for="code_program">Kode</label>
					<input class="form-control" id="code_program"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="parent_id">Keterangan</label>
					<input class="form-control" id="description"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = {{$id}}</script>
	<script src="{{asset('api/edit-program.js')}}"></script>
@endsection