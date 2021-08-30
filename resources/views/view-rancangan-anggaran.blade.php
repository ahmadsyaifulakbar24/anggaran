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
					<div>II/2746/BDF/001/051</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Nama Kegiatan</b>
					<div>Pengembangan pembiayaan Alternatif Non-bank bagi koperasi</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold" class="col-form-label">Target</b>
					<div>100 Koperasi</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Anggaran (Rp.)</b>
					<div>871.900.000</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6 col-xl-4 mb-2">
							<b class="font-weight-bold" class="col-form-label pb-0">File TOR</b>
							<div class="small text-secondary mb-2">*Maksimal 2 file</div>
							<div>
								<div class="card mb-2" data-id="${value.id}" data-title="${value.name}">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
											<i class="mdi mdi-24px mdi-file-outline text-dark"></i>
											<div class="text-primary text-truncate">TOR.docx</div>
										</a>
										<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete delete-attachment px-3" role="button"></i>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary upload">Upload File</button>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6 col-xl-4 mb-2">
							<b class="font-weight-bold" class="col-form-label pb-0">File RAB</b>
							<div class="small text-secondary mb-2">*Maksimal 2 file</div>
							<div>
								<div class="card mb-2" data-id="${value.id}" data-title="${value.name}">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
											<i class="mdi mdi-24px mdi-file-outline text-dark"></i>
											<div class="text-primary text-truncate">RAB.docx</div>
										</a>
										<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete delete-attachment px-3" role="button"></i>
									</div>
								</div>
								<div class="card mb-2" data-id="${value.id}" data-title="${value.name}">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
											<i class="mdi mdi-24px mdi-file-outline text-dark"></i>
											<div class="text-primary text-truncate">RAB.xlsx</div>
										</a>
										<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete delete-attachment px-3" role="button"></i>
									</div>
								</div>
							</div>
							<!-- <button type="button" class="btn btn-sm btn-block btn-outline-primary upload">Upload File</button> -->
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-md-6 col-xl-4 mb-2">
							<b class="font-weight-bold" class="col-form-label pb-0">File Dukungan Lainnya</b>
							<div class="small text-secondary mb-2">*Maksimal 5 file</div>
							<div>
								<div class="card mb-2" data-id="${value.id}" data-title="${value.name}">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
											<i class="mdi mdi-24px mdi-file-outline text-dark"></i>
											<div class="text-primary text-truncate">Anggaran.docx</div>
										</a>
										<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete delete-attachment px-3" role="button"></i>
									</div>
								</div>
								<div class="card mb-2" data-id="${value.id}" data-title="${value.name}">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0)" class="d-flex align-items-center text-truncate my-3 ml-3" style="width: 90%">
											<i class="mdi mdi-24px mdi-file-outline text-dark"></i>
											<div class="text-primary text-truncate">Lainnya.docx</div>
										</a>
										<i class="mdi mdi-24px mdi-trash-can-outline ml-auto delete delete-attachment px-3" role="button"></i>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary upload">Upload File</button>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold" class="col-form-label">Lokasi</b>
					<div>Provinsi Jawa Barat</div>
					<div>- Kab. Tasikmalaya</div>
					<div>- Kab. Bandung</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Rincian Detail</b>
					<div>1. Pendampingan = Rp. 70.000.000</div>
					<div>2. Fasilitasi = Rp. 50.000.000</div>
					<div>3. Bantuan = Rp. 58.380.000</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Keterangan</b>
					<div>-</div>
				</div>
				<div class="form-group">
					<b class="font-weight-bold">Komentar</b>
					<form class="mt-2" id="form-comment">
						<div class="d-flex align-items-start mb-3">
							<img src="{{asset('assets/images/user.png')}}" class="rounded-circle mt-1" width="30" alt="">
							<div class="input-group ml-3">
								<input class="form-control" id="comment" placeholder="Tulis komentar...">
								<div class="input-group-append" id="submit-comment">
									<button type="button" class="btn btn-sm btn-dark rounded-right">Komentar</button>
								</div>
								<div class="invalid-feedback"></div>
							</div>
						</div>
					</form>
					<div id="comment-task">
						<div class="d-flex align-items-start mb-3" data-id="${value.id}" data-title="${value.comment}">
							<img src="{{asset('assets/images/user.png')}}" class="rounded-circle mb-1" width="30" alt="">
							<div class="ml-3">
								<div><b>Admin</b> <small class="text-secondary">30 Agustus 2021</small></div>
								<div>Acc</div>
							</div>
						</div>
						<div class="d-flex align-items-start mb-3" data-id="${value.id}" data-title="${value.comment}">
							<img src="{{asset('assets/images/user.png')}}" class="rounded-circle mb-1" width="30" alt="">
							<div class="ml-3">
								<div><b>Deputi Usaha Mikro</b> <small class="text-secondary">29 Agustus 2021</small></div>
								<div>Oke</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/view-rancangan-program.js')}}"></script> -->
	<script>
		if (role != 'asdep') $('.upload').hide()
	</script>
@endsection