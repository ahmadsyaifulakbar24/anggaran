@extends('layouts/app')

@section('title','Detail Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Detail Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<div class="card-body">
				<div class="form-group">
					<b class="font-weight-bold">Kode</b>
					<div id="code"></div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Nama Kegiatan</b>
					<div id="component_name"></div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold" class="col-form-label">Target</b>
					<div id="target"></div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Anggaran (Rp.)</b>
					<div id="budged"></div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold" class="col-form-label">Lokasi</b>
					<div id="province"></div>
					<div id="city"></div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Rincian Detail</b>
					<pre id="detail"></pre>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Keterangan</b>
					<pre id="description"></pre>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
							<b class="font-weight-bold" class="col-form-label pb-0">File TOR</b>
							<div class="small text-secondary mb-2">*Maksimal 2 file.</div>
							<div id="type-1"></div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary upload" id="btn-type-1" data-type="1">Upload File</button>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
							<b class="font-weight-bold" class="col-form-label pb-0">File RAB</b>
							<div class="small text-secondary mb-2">*Maksimal 2 file.</div>
							<div id="type-2"></div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary upload" id="btn-type-2" data-type="2">Upload File</button>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6 col-xl-4 mb-2">
							<b class="font-weight-bold" class="col-form-label pb-0">File Dukungan Lainnya</b>
							<div class="small text-secondary mb-2">*Maksimal 5 file.</div>
							<div id="type-3"></div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary upload" id="btn-type-3" data-type="3">Upload File</button>
							<div class="invalid-feedback"></div>
						</div>
					</div>
					<input type="file" class="none" id="file">
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Komentar</b>
					<form class="mt-2" id="form-comment">
						<div class="d-flex align-items-start mb-3">
							<img class="avatar rounded-circle" width="30" alt="">
							<div class="input-group ml-3">
								<textarea class="form-control form-control-sm comment" id="comment" placeholder="Tulis komentar..."></textarea>
								<div class="input-group-append">
									<button class="btn btn-sm btn-dark rounded-right" id="submit-comment">Komentar</button>
								</div>
								<div class="invalid-feedback"></div>
							</div>
						</div>
					</form>
					<div id="comments"></div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">Hapus File</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">Anda yakin ingin menghapus file <b id="title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script>const id = {{$id}}</script>
	<script src="{{asset('assets/js/file.js')}}"></script>
	<script src="{{asset('api/view-rancangan-anggaran.js')}}"></script>
@endsection