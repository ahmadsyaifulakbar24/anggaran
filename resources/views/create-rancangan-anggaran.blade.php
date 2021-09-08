@extends('layouts/app')

@section('title','Buat Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Buat Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-row mb-2">
					<div class="col-12 mb-3">
						<label for="program">Pilih Program</label>
						<select class="custom-select" id="program" size="5">
							<option value="1">I - Program Dukungan Manajemen</option>
							<option value="2">II - Program Kewirausahaan, UMKM dan Koperasi</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<label for="kegiatan">Pilih Kegiatan</label>
						<select class="custom-select" id="kegiatan" size="5">
							<option class="none" value="3">2746 - Pembiayaan dan Penjaminan Perkoperasian</option>
							<option class="none" value="4">4442 - Pengembangan dan Pembaruan Perkoperasian</option>
							<option class="none" value="5">5615 - Pengembangan SDM Perkoperasian dan Jabatan Fungsional</option>
							<option class="none" value="6">4458 - Pengawasan Koperasi</option>
							<option class="none" value="7">4948 - Pengembangan dan Penguatan Kontribusi Gerakan Koperasi</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<label for="kro">Pilih KRO</label>
						<select class="custom-select" id="kro" size="5">
							<option class="none" value="11">BDF - Fasilitasi dan Pembinaan Koperasi</option>
							<option class="none" value="12">QDF - Fasilitasi dan Pembinaan Koperasi</option>
							<option class="none" value="14">FAE - Pemantauan Dan Evaluasi Serta Laporan</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="code_ro">Kode RO</label>
						<input class="form-control" id="code_ro"></select>
					</div>
					<div class="form-group col">
						<label for="ro">Nama RO</label>
						<input class="form-control" id="ro"></select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="code_component">Kode Komponen</label>
						<input class="form-control" id="code_component"></select>
					</div>
					<div class="form-group col">
						<label for="component">Nama Komponen</label>
						<input class="form-control" id="component"></select>
					</div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Target</label>
					<div class="form-row">
						<div class="col-6 mb-1">
							<input type="text" class="form-control" id="total_target" placeholder="Jumlah">
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-6">
							<input type="text" class="form-control" id="unit_target" placeholder="Satuan">
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="budged">Anggaran (Rp.)</label>
					<input class="form-control number" id="budged"></select>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Lokasi</label>
					<div class="form-row">
						<div class="col-md-6 mb-2">
							<select class="custom-select" id="province_id" role="button">
								<option value="" disabled selected>Pilih Provinsi/Pusat</option>
								<option value="10">Pusat</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6">
							<div id="location">
								<div class="d-flex align-items-start mb-2">
									<div class="col px-0">
										<select class="custom-select city_id" role="button">
											<option value="" disabled selected>Pilih Kab/Kota</option>
										</select>
										<div class="invalid-feedback"></div>
									</div>
									<div class="col-1 pt-1">
										<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
									</div>
								</div>
							</div>
							<div class="btn btn-sm btn-block btn-outline-primary" onclick="return add_location()">Tambah Lokasi</div>
							<div class="btn btn-sm btn-block btn-primary mt-2" onclick="return check_location()">Check</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="detail">Rincian Detail</label>
					<textarea class="form-control form-control-sm" rows="5" id="detail"></textarea>
				</div>
				<div class="form-group">
					<label for="description">Keterangan</label>
					<textarea class="form-control form-control-sm" rows="5" id="description"></textarea>
				</div>
				<div class="form-group">
					<a href="{{url('rancangan-anggaran/1')}}" class="btn btn-primary">Submit</a>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/create-rancangan-anggaran.js')}}"></script>
@endsection