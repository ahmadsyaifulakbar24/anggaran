@extends('layouts/app')

@section('title','Buat Komponen')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Buat Komponen</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="component_code">Kode Komponen</label>
					<input class="form-control" id="component_code"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="component_name">Nama Komponen</label>
					<input class="form-control" id="component_name"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Target</label>
					<div class="form-row">
						<div class="col-6 mb-1">
							<input type="text" class="form-control number" id="total_target" placeholder="Jumlah">
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-6">
							<select class="custom-select" id="unit_target" role="button">
								<option value="" disabled selected>Pilih Satuan</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Lokasi</label>
					<div id="location"></div>
					<div class="btn btn-block btn-outline-primary py-1" onclick="return add_province()">Tambah Lokasi</div>
					<!-- <div class="btn btn-block btn-primary py-1" onclick="return check_location()">Check Lokasi</div> -->
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Sumber Pendanaan</label>
					<div id="sources_funding"></div>
					<div class="btn btn-block btn-outline-primary py-1 mb-2 add_sources_funding" onclick="return add_sources_funding()">
						<i class="mdi mdi-plus"></i>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-sm-6 mb-1">
							<label for="target_id" class="col-form-label">Sasaran</label>
							<select class="custom-select" id="target_id" role="button">
								<option value="" disabled selected>Pilih</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-sm-6">
							<label for="indicator_id" class="col-form-label">Indikator</label>
							<select class="custom-select" id="indicator_id" role="button">
								<option value="" disabled selected>Pilih</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="detail">Rincian Detail</label>
					<textarea class="form-control form-control-sm" rows="5" id="detail"></textarea>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="description">Keterangan</label>
					<textarea class="form-control form-control-sm" rows="5" id="description"></textarea>
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
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script>const user_ro_id = {{$user_ro_id}}</script>
	<script src="{{asset('api/asdep/create-komponen.js')}}"></script>
@endsection