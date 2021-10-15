@extends('layouts/app')

@section('title','Komponen')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Komponen</h4>
			<div class="text-right">
				<div class="btn btn-outline-primary view mb-1" data-toggle="modal" data-target="#modal-view">View Sebagai</div>
				<div class="btn btn-outline-primary export mb-1">Export Excel</div>
			</div>
		</div>
		<div class="card card-custom none" id="card">
			<div class="d-flex justify-content-between align-items-center p-3">
				@if(session("role") != "asdep")
				<div>
					<b>View Sebagai</b>
					<b class="text-secondary">(<span id="view"></span>)</b>
				</div>
				@endif
				<div>
					<input id="search" class="form-control form-control-sm" placeholder="Cari Nama Komponen">
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate" rowspan="2">No.</th>
							<th class="text-truncate" rowspan="2">Kode Komponen</th>
							<th class="text-truncate" rowspan="2">Nama Komponen</th>
							<th class="text-truncate" rowspan="2">Target</th>
							<th class="text-truncate text-center border-left border-right" colspan="3">Anggaran</th>
							<th class="text-truncate unit border-right" rowspan="2">Unit</th>
							<th class="text-truncate pengguna border-right" rowspan="2">Pengguna</th>
							<th class="text-truncate text-center border-left border-right" colspan="2">Approval</th>
							<th colspan="2" rowspan="2"></th>
						</tr>
						<tr>
							<th class="text-truncate border-left">RM</th>
							<th class="text-truncate">BLU</th>
							<th class="text-truncate border-right">Total</th>
							<th class="text-truncate deputi_status">Tingkat Deputi</th>
							<th class="text-truncate admin_status border-right">Tingkat Admin</th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
					<tbody id="table-loading" class="none">
						<tr>
							<td>
								<div class="loader loader-sm">
									<svg class="circular" viewBox="25 25 50 50">
										<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
									</svg>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- <table class="mt-3" border="1">
		<thead>
			<tr class="text-center">
				<th>Kode Kegiatan</th>
				<th colspan="4">Program/Kegiatan/KRO/RO/Komponen</th>
				<th colspan="2">Target</th>
				<th>Anggaran (Rp.)</th>
				<th colspan="2">Lokasi</th>
				<th>Rincian Detail</th>
				<th>Keterangan</th>
				<th>Pengguna</th>
			</tr>
			<tr class="text-center">
				<th>1</th>
				<th colspan="4">2</th>
				<th colspan="2">3</th>
				<th>4</th>
				<th colspan="2"></th>
				<th></th>
				<th>5</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="table-excel"></tbody>
	</table> -->
	<div class="modal" id="modal-view" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">View Sebagai</h5>
	            </div>
	            <form>
		            <div class="modal-body">
						<div class="form-group">
							<label for="title">Akun</label>
							<select class="custom-select" id="view-as" role="button">
								<option class="option-deputi" value="">Semua Deputi</option>
								<option class="option-asdep" value="">Semua Asdep</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
		            </div>
		            <div class="modal-footer border-top-0">
		                <button class="btn btn-primary" id="submit">Terapkan</button>
		            </div>
		        </form>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Hapus Komponen</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin menghapus komponen <b id="title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Setujui Komponen</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin setujui komponen <b id="approve-title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-primary" id="approve">Setujui</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-decline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Tolak Komponen</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin tolak komponen <b id="decline-title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="decline">Tolak</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('assets/js/exportCsv.js')}}"></script>
	<script src="{{asset('api/status-rekap-anggaran.js')}}"></script>
@endsection