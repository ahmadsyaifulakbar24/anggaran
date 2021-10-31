@extends('layouts/app')

@section('title','Program')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-end mb-2">
			<div>
				<h4>Program</h4>
				<div class="card card-custom">
					<div class="card-body">
						<h6>Total Anggaran ACC</h6>
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="mb-0" id="total_budged">Rp0</h5>
						</div>
					</div>
				</div>
			</div>
			<div>
				<a href="{{url('asdep/program/create')}}" class="btn btn-primary create none">Buat Program</a>
				<div class="btn btn-outline-primary view mb-1" data-toggle="modal" data-target="#modal-view">View Sebagai</div>
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
							<th class="option"></th>
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
	                <h5 class="modal-title">Hapus Program</h5>
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
							<select class="custom-select" id="view-as" role="button"></select>
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
@endsection

@section('script')
	<script src="{{asset('api/asdep/program.js')}}"></script>
@endsection