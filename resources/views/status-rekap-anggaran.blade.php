@extends('layouts/app')

@section('title','Status & Rekap Anggaran')

@section('style')
	<style>
		.table-excel th:first-child, .table-excel td:first-child {
			padding-left: 0 !important;
		}
		.table-excel th:last-child, .table-excel td:last-child {
			padding-right: 0 !important;
		}
		.table-excel th {
			vertical-align: center !important;
		}
		.table-excel td {
			vertical-align: top !important;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<h4>Status & Rekap Anggaran</h4>
			<div class="text-right mb-2">
				<div class="btn btn-outline-primary view mb-1" data-toggle="modal" data-target="#modal-view">View Sebagai</div>
				<div class="btn btn-outline-primary excel mb-1" onclick="return view_excel()">View Excel</div>
				<div class="btn btn-primary excel mb-1" onclick="return view_excel('download')">Download Excel</div>
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
							<th class="text-truncate status border-right" rowspan="2">Status</th>
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
			<div class="card-footer hide" id="pagination">
				<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
					<small class="text-secondary pb-3 pb-md-0" id="pagination-label"></small>
					<nav>
						<ul class="pagination pagination-sm mb-0" data-filter="request">
							<li class="page page-item disabled" id="first">
								<span class="page-link"><i class="mdi mdi-chevron-double-left"></i></span>
							</li>
							<li class="page page-item disabled" id="prev">
								<span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
							</li>
							<li class="page page-item" id="prevCurrentDouble"><span class="page-link"></span></li>
							<li class="page page-item" id="prevCurrent"><span class="page-link"></span></li>
							<li class="page page-item" id="current"><span class="page-link"></span></li>
							<li class="page page-item" id="nextCurrent"><span class="page-link"></span></li>
							<li class="page page-item" id="nextCurrentDouble"><span class="page-link"></span></li>
							<li class="page page-item" id="next">
								<span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
							</li>
							<li class="page page-item" id="last">
								<span class="page-link"><i class="mdi mdi-chevron-double-right"></i></span>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="modal-excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-xl modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0 pb-0">
	                <h5 class="modal-title" id="exampleModalLabel">View Excel</h5>
	            </div>
	            <div class="modal-body pt-0">
	            	<div class="table-responsive">
						<table class="table-excel mt-3" border="1" id="excel">
							<thead>
								<tr class="text-center">
									<th rowspan="2">Kode Kegiatan</th>
									<th rowspan="2" colspan="4">Program/Kegiatan/KRO/RO/Komponen</th>
									<th rowspan="2" colspan="2">Target</th>
									<th colspan="3">Anggaran (Rp.)</th>
									<th rowspan="2">Lokasi</th>
									<th rowspan="2" class="text-truncate">PP 7 Tahun 2021</th>
									<th rowspan="2">Penugasan</th>
									<th rowspan="2">Keterangan</th>
									<th rowspan="2">Pengguna</th>
								</tr>
								<tr class="text-center">
									<th>RM</th>
									<th>BLU</th>
									<th>Total</th>
								</tr>
								<!-- <tr class="text-center">
									<th>1</th>
									<th colspan="4">2</th>
									<th colspan="2">3</th>
									<th colspan="3">4</th>
									<th></th>
									<th></th>
									<th>5</th>
									<th></th>
								</tr> -->
							</thead>
							<tbody id="table-excel"></tbody>
						</table>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
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
	            <div class="modal-body">Anda yakin ingin menghapus komponen <b></b>?</div>
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
	            <div class="modal-body">Anda yakin ingin setujui komponen <b></b>?</div>
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
	            <div class="modal-body">Anda yakin ingin tolak komponen <b></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="decline">Tolak</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-delete-file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Hapus File</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin menghapus file <b></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete-file">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Lock Komponen</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin mengunci komponen <b></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-primary px-3" id="lock">Lock</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal" id="modal-unlock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Unlock Komponen</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin membuka komponen <b></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-primary" id="unlock">Unlock</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('assets/js/exportExcel.js')}}"></script>
	<script src="{{asset('api/status-rekap-anggaran.js')}}"></script>
@endsection