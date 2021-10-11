@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<div class="card card-custom mb-3">
			<div class="card-body">
				<h6>Total Anggaran Per Provinsi</h6>
				<form class="row mb-xl-2 align-items-center" id="get_by_province">
					<div class="col-md-10">
						<select class="custom-select mb-2 mb-md-0" id="province_id" role="button" required>
							<option value="" disabled selected>Pilih</option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-block btn-primary py-1">Submit</button>
					</div>
				</form>
				<div id="province-table" class="table-responsive none">
					<h6 class="pt-2" id="total-province"></h6>
					<h6 id="total-province-budged"></h6>
					<table class="table mt-3">
						<thead>
							<tr>
								<th class="text-truncate">No.</th>
								<th class="text-truncate">Kode Komponen</th>
								<th class="text-truncate">Nama Komponen</th>
								<th class="text-truncate">Anggaran (Rp.)</th>
								<th class="text-truncate">Target</th>
								<th class="text-truncate">Satuan</th>
								<th class="text-truncate">Lokasi</th>
							</tr>
						</thead>
						<tbody id="province"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card card-custom mb-3">
			<div class="card-body">
				<h6>Total Anggaran Per Indikator</h6>
				<form class="row mb-xl-2 align-items-center" id="get_by_indicator">
					<div class="col-md-10">
						<select class="custom-select mb-2 mb-md-0" id="indicator_id" role="button" required>
							<option value="" disabled selected>Pilih</option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-block btn-primary py-1">Submit</button>
					</div>
				</form>
				<div id="indicator-table" class="table-responsive none">
					<h6 class="pt-2" id="total-indicator"></h6>
					<h6 id="total-indicator-budged"></h6>
					<table class="table mt-3">
						<thead>
							<tr>
								<th class="text-truncate">No.</th>
								<th class="text-truncate">Kode Komponen</th>
								<th class="text-truncate">Nama Komponen</th>
								<th class="text-truncate">Anggaran (Rp.)</th>
								<th class="text-truncate">Target</th>
								<th class="text-truncate">Satuan</th>
								<th class="text-truncate">Lokasi</th>
							</tr>
						</thead>
						<tbody id="indicator"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card card-custom mb-3">
			<div class="card-body">
				<h6>Total Anggaran Per Unit</h6>
				<div id="statistic-table" class="table-responsive">
					<!-- <h6 class="pt-3 pb-2" id="total-rekapitulasi">asd</h6> -->
					<table class="table mt-3">
						<thead>
							<tr>
								<th class="text-truncate">No.</th>
								<th class="text-truncate">Unit</th>
								<th class="text-truncate">Total Anggaran ACC</th>
								<th class="text-truncate">Total Anggaran Pengajuan</th>
							</tr>
						</thead>
						<tbody id="statistic"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="data"></div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('api/dashboard.js')}}"></script>
@endsection