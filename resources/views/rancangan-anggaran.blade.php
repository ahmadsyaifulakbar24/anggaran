@extends('layouts/app')

@section('title','Rancangan Anggaran')

@section('content')
	<div class="container">
		<div class="d-sm-flex justify-content-between align-items-center mb-2">
			<h4>Rancangan Anggaran</h4>
			<div class="text-right">
				<a href="{{url('rancangan-anggaran/create')}}" class="btn btn-primary create mb-1">Buat Kegiatan</a>
				<button class="btn btn-outline-primary view mb-1" data-toggle="modal" data-target="#modal-view">View Sebagai</button>
				<button class="btn btn-outline-primary export mb-1">Export Excel</button>
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
					<input id="search" class="form-control form-control-sm" placeholder="Cari Nama Kegiatan">
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Kode</th>
							<th class="text-truncate" style="padding-right: 200px;">Nama Kegiatan</th>
							<th class="text-truncate">Target</th>
							<th class="text-truncate">Anggaran (Rp.)</th>
							<th class="text-truncate unit">Unit</th>
							<th class="text-truncate pengguna">Pengguna</th>
							<th class="text-truncate deputi_status">Status</th>
							<th class="text-truncate admin_status">Status Admin</th>
							<th colspan="2"></th>
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
	                <h5 class="modal-title" id="exampleModalLabel">Hapus Kegiatan</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin menghapus kegiatan <b id="title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('api/rancangan-anggaran.js')}}"></script>
@endsection