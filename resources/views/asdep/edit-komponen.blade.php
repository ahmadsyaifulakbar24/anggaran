@extends('layouts/app')

@section('title','Edit Komponen')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Edit Komponen</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="component_code">Kode Komponen *</label>
					<input class="form-control" id="component_code" />
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="component_name">Nama Komponen *</label>
					<input class="form-control" id="component_name" />
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Target *</label>
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
					<label for="total_target" class="col-form-label">Lokasi *</label>
					<div id="location"></div>
					<div class="btn btn-block btn-outline-primary py-1" onclick="return add_province()">Tambah Lokasi</div>
					<!-- <div class="btn btn-block btn-primary py-1" onclick="return check_location()">Check Lokasi</div> -->
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Sumber Pendanaan *</label>
					<div id="sources_funding"></div>
					<div class="btn btn-block btn-outline-primary py-1 mb-2 add_sources_funding" onclick="return add_sources_funding()">
						<i class="mdi mdi-plus"></i>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-sm-6 mb-2">
							<label for="target_indicator_status" class="col-form-label pb-0">Status Sasaran & Indikator *</label>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="target_indicator_status" id="target_indicator_status1" value="1" role="button">
								<label class="form-check-label font-weight-light" for="target_indicator_status1" role="button">
									Mendukung sasaran & indikator
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="target_indicator_status" id="target_indicator_status0" value="0" role="button">
								<label class="form-check-label font-weight-light" for="target_indicator_status0" role="button">
									Tidak mendukung sasaran & indikator
								</label>
							</div>
							<input type="hidden" id="target_indicator_status">
							<div class="invalid-feedback"></div>
							<div class="none" id="target_indicator-form">
								<div class="mt-2">
									<label for="target_id" class="d-block col-form-label text-secondary">Sasaran *</label>
									<select class="custom-select" id="target_id" role="button">
										<option value="" disabled selected>Pilih</option>
									</select>
									<div class="invalid-feedback"></div>
								</div>
								<div class="my-2">
									<label for="indicator_id" class="d-block col-form-label text-secondary">Indikator *</label>
									<select class="custom-select" id="indicator_id" role="button">
										<option value="" disabled selected>Pilih</option>
									</select>
									<div class="invalid-feedback"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<label for="pp7_status" class="col-form-label pb-0">Status PP 7 tahun 2021 *</label>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pp7_status" id="pp7_status1" value="1" role="button">
								<label class="form-check-label font-weight-light" for="pp7_status1" role="button">
									Mendukung PP 7 tahun 2021
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="pp7_status" id="pp7_status0" value="0" role="button">
								<label class="form-check-label font-weight-light" for="pp7_status0" role="button">
									Tidak mendukung PP 7 tahun 2021
								</label>
							</div>
							<input type="hidden" id="pp7_status">
							<div class="invalid-feedback"></div>
							<div class="none mt-2" id="pp7-form">
								<label for="pp7_id" class="d-block col-form-label text-secondary">Program PP 7 tahun 2021 *</label>
								<select class="custom-select" id="pp7_id" role="button">
									<option value="" disabled selected>Pilih</option>
								</select>
								<div class="invalid-feedback"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<label for="assignment_status" class="col-form-label pb-0">Status Penugasan *</label>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="assignment_status" id="assignment_status1" value="1" role="button">
								<label class="form-check-label font-weight-light" for="assignment_status1" role="button">
									Mendukung penugasan
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="assignment_status" id="assignment_status0" value="0" role="button">
								<label class="form-check-label font-weight-light" for="assignment_status0" role="button">
									Tidak mendukung penugasan
								</label>
							</div>
							<input type="hidden" id="assignment_status">
							<div class="invalid-feedback"></div>
							<div class="none mt-2" id="assignment-form">
								<label for="assignment" class="d-block col-form-label text-secondary pb-0">Penugasan *</label>
								<div id="assignment"></div>
								<div class="invalid-feedback"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="detail">Rincian Detail *</label>
					<textarea class="form-control form-control-sm" rows="5" id="detail"></textarea>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="description">Keterangan *</label>
					<textarea class="form-control form-control-sm" rows="5" id="description"></textarea>
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
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script>const user_ro_id = {{$user_ro_id}}</script>
	<script>const id = {{$id}}</script>
	<script src="{{asset('api/asdep/edit-komponen.js')}}"></script>
@endsection