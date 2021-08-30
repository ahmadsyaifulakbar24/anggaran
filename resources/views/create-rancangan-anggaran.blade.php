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
						<!-- <select class="custom-select" id="program" onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'> -->
						<select class="custom-select" id="program" size="5">
							<option value="1">I - Program Dukungan Manajemen</option>
							<option value="2">II - Program Kewirausahaan, UMKM dan Koperasi</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<label for="sub_program">Pilih Sub Program</label>
						<select class="custom-select" id="sub_program" size="5">
							<option class="none" value="3">2746 - Pembiayaan dan Penjaminan Perkoperasian</option>
							<option class="none" value="4">4442 - Pengembangan dan Pembaruan Perkoperasian</option>
							<option class="none" value="5">5615 - Pengembangan SDM Perkoperasian dan Jabatan Fungsional</option>
							<option class="none" value="6">4458 - Pengawasan Koperasi</option>
							<option class="none" value="7">4948 - Pengembangan dan Penguatan Kontribusi Gerakan Koperasi</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<label for="kode_program">Pilih Kode Program</label>
						<select class="custom-select" id="kode_program" size="5">
							<option class="none" value="11">BDF - Fasilitasi dan Pembinaan Koperasi</option>
							<option class="none" value="12">QDF - Fasilitasi dan Pembinaan Koperasi</option>
							<option class="none" value="14">FAE - Pemantauan Dan Evaluasi Serta Laporan</option>
						</select>
					</div>
					<div class="col-12 mb-3">
						<label for="kode_program">Pilih Kode Kegiatan</label>
						<select class="custom-select" id="kode_kegiatan" size="5">
							<option class="none" value="16">001 - Lembaga Keuangan Koperasi yang dikembangkan</option>
							<option class="none" value="17">002 - Koperasi yang mendapatkan Dukungan Permodalan dan Penjaminan</option>
							<option class="none" value="18">003 - Koperasi yang mendapatkan akses dan skema pembiayaan</option>
							<option class="none" value="19">004 - Kebijakan Pembiayaan Perkoperasian yang dievaluasi</option>
							<option class="none" value="20">005 - Koperasi yang difasilitasi sistem digitalisasi</option>
						</select>
					</div>
				</div>
				<div class="form-group">
						<label for="code_program">Nomor</label>
					<input class="form-control" id="code_program"></select>
				</div>
				<div class="form-group">
					<label for="description">Nama Kegiatan</label>
					<input class="form-control" id="description"></select>
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
						<div class="col-xl-4 mb-1">
							<select class="custom-select" id="province_id">
								<option value="" disabled selected>Pilih Pusat</option>
								<option value="1">KEMENKOP UKM</option>
								<option value="2">LPDB</option>
								<option value="3">LLP KUKM</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-xl-4 mb-1">
							<select class="custom-select" id="province_id">
								<option value="" disabled selected>Pilih Provinsi</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-xl-4">
							<select class="custom-select" id="city_id">
								<option value="" disabled selected>Pilih Kab/Kota</option>
							</select>
							<div class="invalid-feedback"></div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary mt-2">Tambah Kab/Kota</button>
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
	<!-- <script src="{{asset('api/create-rancangan-program.js')}}"></script> -->
	<script>
		$('#program').change(function() {
			$('#sub_program option').show()
			$('#kode_program option').hide()
			$('#kode_kegiatan option').hide()
			$('#sub_program option:selected').prop('selected', false)
		})
		$('#sub_program').change(function() {
			$('#kode_program option').show()
			$('#kode_kegiatan option').hide()
			$('#kode_program option:selected').prop('selected', false)
		})
		$('#kode_program').change(function() {
			$('#kode_kegiatan option').show()
			$('#kode_kegiatan option:selected').prop('selected', false)
		})
	</script>
@endsection