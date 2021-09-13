@extends('layouts/app')

@section('title','Buat Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Ubah Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-row mb-2">
					<div class="col-12 mb-3">
						<label for="program">Pilih Program</label>
						<select class="custom-select" id="parent" size="5"></select>
						<div class="invalid-feedback">Pilih program.</div>
					</div>
					<div class="col-12 mb-3">
						<label for="kegiatan">Pilih Kegiatan</label>
						<select class="custom-select" id="program_id" size="5"></select>
						<div class="invalid-feedback"></div>
					</div>
					<div class="col-12 mb-3">
						<div>
							<label for="kro">Pilih KRO</label>
							<select class="custom-select" id="type_kro" role="button">
								<option value="" disabled selected>Pilih Tipe KRO</option>
								<option value="pn">Prioritas Nasional</option>
								<option value="non_pn">Non Prioritas Nasional</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="mt-2">
							<select class="custom-select" id="kro_id" size="5"></select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="code_ro">Kode RO</label>
						<input class="form-control" list="ro_id" id="code_ro" autocomplete="off"></select>
						<datalist id="ro_id"></datalist>
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group col">
						<label for="ro">Nama RO</label>
						<input class="form-control" id="name_ro"></select>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="component_code">Kode Komponen</label>
						<input class="form-control" id="component_code"></select>
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group col">
						<label for="component_name">Nama Komponen</label>
						<input class="form-control" id="component_name"></select>
						<div class="invalid-feedback"></div>
					</div>
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
								<option value="Layanan">Layanan</option>
								<option value="Koperasi">Koperasi</option>
								<option value="Paket">Paket</option>
								<option value="Unit">Unit</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="budged">Anggaran (Rp.)</label>
					<input class="form-control number" id="budged"></select>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Lokasi</label>
					<div class="form-row">
						<div class="col-md-6 mb-2">
							<select class="custom-select" id="province_id" role="button">
								<option value="" disabled selected>Pilih Lokasi</option>
								<option value="1">Pusat</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6">
							<div id="location"></div>
							<div class="btn btn-sm btn-block btn-outline-primary" onclick="return add_location()">Tambah Lokasi</div>
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
	<script>const id = {{$id}}</script>
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('api/edit-rancangan-anggaran.js')}}"></script>
@endsection