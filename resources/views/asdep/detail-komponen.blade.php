@extends('layouts/app')

@section('title','Detail Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Detail Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="card-body">
						<div class="form-group">
							<b class="font-weight-bold">Kode Komponen</b>
							<div id="component_code"></div>
						</div>
						<div class="form-group">
							<b class="font-weight-bold">Nama Komponen</b>
							<div id="component_name"></div>
						</div>
						<div class="form-group">
							<b class="font-weight-bold" class="col-form-label">Target</b>
							<div id="target"></div>
						</div>
						<div class="form-group">
							<b class="font-weight-bold" class="col-form-label">Lokasi</b>
							<div id="location"></div>
						</div>
						<div class="form-row">
							<div class="form-group col-6 col-md-4">
								<b class="font-weight-bold">Anggaran (RM)</b>
								<div id="rm">Rp0</div>
							</div>
							<div class="form-group col-6 col-md-4">
								<b class="font-weight-bold">Anggaran (BLU)</b>
								<div id="blu">Rp0</div>
							</div>
							<div class="form-group col-md-4">
								<b class="font-weight-bold">Anggaran (Total)</b>
								<div id="budged">Rp0</div>
							</div>
						</div>
						<div class="form-group">
							<b class="font-weight-bold">Sasaran</b>
							<div id="sasaran"></div>
						</div>
						<div class="form-group">
							<b class="font-weight-bold">Indikator</b>
							<div id="indicator"></div>
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
								<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
									<b class="font-weight-bold" class="col-form-label pb-0">File TOR</b>
									<div class="small text-secondary mb-2">*Maksimal 2 file.</div>
									<div id="type-1"></div>
									<div class="btn btn-sm btn-block btn-outline-primary upload" data-type="1" data-category="work_plan">Upload File</div>
									<div class="invalid-feedback"></div>
								</div>
								<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
									<b class="font-weight-bold" class="col-form-label pb-0">File RAB</b>
									<div class="small text-secondary mb-2">*Maksimal 2 file.</div>
									<div id="type-2"></div>
									<div class="btn btn-sm btn-block btn-outline-primary upload" data-type="2" data-category="work_plan">Upload File</div>
									<div class="invalid-feedback"></div>
								</div>
								<div class="col-md-6 col-lg-4 mb-2">
									<b class="font-weight-bold" class="col-form-label pb-0">File Dukungan Lainnya</b>
									<div class="small text-secondary mb-2">*Maksimal 5 file.</div>
									<div id="type-3"></div>
									<div class="btn btn-sm btn-block btn-outline-primary upload" data-type="3" data-category="work_plan">Upload File</div>
									<div class="invalid-feedback"></div>
								</div>
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
						</div><hr>
						<div class="row">
							<div class="col-md-6">
								<b class="font-weight-bold">Komentar</b>
								<form class="mt-2" id="form-comment">
									<div class="d-flex align-items-start mb-3">
										<img class="avatar rounded-circle" width="30" alt="">
										<div class="w-100 ml-3">
											<textarea class="form-control form-control-sm w-100" oninput="auto_grow(this)" id="comment" placeholder="Tulis komentar..."></textarea>
											<div class="invalid-feedback"></div>
											<div class="float-right mt-1">
												<button type="reset" class="btn btn-sm btn-outline-primary">Batal</button>
												<button class="btn btn-sm btn-primary" id="submit-comment" disabled>Komentar</button>
											</div>
										</div>
									</div>
								</form>
								<div class="w-100" id="comments"></div>
							</div>
							<div class="col-md-6">
								<b class="font-weight-bold">History</b>
								<div id="history"></div>
							</div>
						</div>
					</div>
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
	            <div class="modal-body">Anda yakin ingin menghapus file <b id="title"></b>?</div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete-file">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script>const id = {{$id}}</script>
	<script src="{{asset('assets/js/file.js')}}"></script>
	<script src="{{asset('api/asdep/detail-komponen.js')}}"></script>
@endsection