@extends('layouts/app')

@section('title','Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-end mb-2">
			<div>
				<h4>Kegiatan</h4>
				<div class="card card-custom">
					<div class="card-body">
						<h6>Total Anggaran ACC</h6>
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="mb-0" id="total_budged"></h5>
						</div>
					</div>
				</div>
			</div>
			<div>
				<a href="{{url('asdep/kegiatan/create/'.$user_program_id)}}" class="btn btn-primary">Buat Kegiatan</a>
			</div>
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Kode</th>
							<th class="text-truncate">Keterangan</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title">Hapus Kegiatan</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">
	            	Anda yakin ingin hapus <b id="title"></b>?
	            </div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script>const user_program_id = {{$user_program_id}}</script>
	<script src="{{asset('api/asdep/kegiatan.js')}}"></script>
@endsection