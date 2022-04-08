@extends('layouts/app')

@section('title','Komponen')

@section('content')
	<div class="container">
		<div class="d-flex align-items-end mb-2">
			<h4><a class="text-dark" id="back"><i class="mdi mdi-arrow-left"></i></a>Detail Komponen</h4>
		</div>
		<div class="d-flex justify-content-between align-items-end mb-2">
			<div class="card card-custom">
				<div class="card-body">
					<h6>Total Anggaran ACC</h6>
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="mb-0" id="total_budged">Rp0</h5>
					</div>
				</div>
			</div>
			<div>
				<a href="{{url('asdep/komponen/create/'.$user_ro_id)}}" class="btn btn-primary create mb-1">Buat Komponen</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 mb-3">
				<div class="card card-custom">
					<div class="card-bodys px-0 py-2">
						<table class="table table-borderless">
							<tr>
								<td><b>Program</b></td>
								<td>:</td>
								<td id="user_program"></td>
							</tr>
							<tr>
								<td><b>Kegiatan</b></td>
								<td>:</td>
								<td id="user_activity"></td>
							</tr>
							<tr>
								<td><b>KRO</b></td>
								<td>:</td>
								<td id="user_kro"></td>
							</tr>
							<tr>
								<td><b>RO</b></td>
								<td>:</td>
								<td id="user_ro"></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-5 mb-3">
				<div class="card card-custom">
					<div class="card-body">
						<div class="small text-secondary mb-1">*Maksimal 2 file</div>
						<div class="small text-secondary mb-1">*Ukuran file maksimal 50 MB</div>
						<div class="small text-secondary mb-2">*Format PDF, DOC, XLS, PPT</div>
						<div class="mb-3" id="tor">
							<b class="font-weight-bold">File TOR RO (Induk)</b>
							<div class="mt-2" id="type-1">
								<i class="small text-secondary empty none">Kosong</i>
							</div>
							<div class="btn btn-sm btn-block btn-outline-primary upload" data-type="1" data-category="user_ro">Upload File</div>
							<div class="invalid-feedback"></div>
						</div>
						<div id="rab">
							<b class="font-weight-bold">File RAB RO (Induk)</b>
							<div class="mt-2" id="type-2">
								<i class="small text-secondary empty none">Kosong</i>
							</div>
							<div class="btn btn-sm btn-block btn-outline-primary upload" data-type="2" data-category="user_ro">Upload File</div>
							<div class="invalid-feedback"></div>
						</div>
						<input type="file" class="none" id="file" accept="
							application/msword,
							application/vnd.ms-excel,
							application/vnd.ms-powerpoint,
							application/vnd.openxmlformats-officedocument.wordprocessingml.document,
							application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,
							application/vnd.openxmlformats-officedocument.presentationml.presentation,
							application/pdf,
						">
					</div>
				</div>
			</div>
		</div>
		<div class="card card-custom nonee" id="card">
			<div class="d-flex justify-content-between align-items-center p-3">
				<!-- @if(session("role") != "asdep")
				<div>
					<b>View Sebagai</b>
					<b class="text-secondary">(<span id="view"></span>)</b>
				</div>
				@endif -->
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
							<!-- <th class="text-truncate text-center border-left border-right" colspan="2">Approval</th> -->
							<th colspan="2" rowspan="2"></th>
						</tr>
						<tr>
							<th class="text-truncate border-left">RM</th>
							<th class="text-truncate">BLU</th>
							<th class="text-truncate border-right">Total</th>
							<!-- <th class="text-truncate deputi_status">Tingkat Deputi</th> -->
							<!-- <th class="text-truncate admin_status border-right">Tingkat Admin</th> -->
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
							<li class="page_pinjaman page-item disabled" id="first">
								<span class="page-link"><i class="mdi mdi-chevron-double-left"></i></span>
							</li>
							<li class="page_pinjaman page-item disabled" id="prev">
								<span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
							</li>
							<li class="page_pinjaman page-item" id="prevCurrentDouble"><span class="page-link"></span></li>
							<li class="page_pinjaman page-item" id="prevCurrent"><span class="page-link"></span></li>
							<li class="page_pinjaman page-item" id="current"><span class="page-link"></span></li>
							<li class="page_pinjaman page-item" id="nextCurrent"><span class="page-link"></span></li>
							<li class="page_pinjaman page-item" id="nextCurrentDouble"><span class="page-link"></span></li>
							<li class="page_pinjaman page-item" id="next">
								<span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
							</li>
							<li class="page_pinjaman page-item" id="last">
								<span class="page-link"><i class="mdi mdi-chevron-double-right"></i></span>
							</li>
						</ul>
					</nav>
				</div>
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
@endsection

@section('script')
	<script src="{{asset('assets/js/file.js')}}"></script>
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('assets/js/exportCsv.js')}}"></script>
	<script src="{{asset('assets/js/pagination.js')}}"></script>
	<script>const user_ro_id = {{$user_ro_id}}</script>
	<script src="{{asset('api/asdep/komponen.js')}}"></script>
@endsection