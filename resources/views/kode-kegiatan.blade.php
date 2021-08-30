@extends('layouts/app')

@section('title','Kode Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Kode Kegiatan</h4>
			<a href="{{url('program/create/kegiatan/'.$kode_program)}}" class="btn btn-sm btn-primary create mb-1">Buat Kode Kegiatan</a>
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Kode</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Unit</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="table">
						<tr>
							<td class="text-center">1.</td>
							<td class="text-truncate">II/2746/BDF/001</td>
							<td class="text-truncate">Fasilitasi dan Pembinaan Koperasi</td>
							<td class="text-truncate">Deputi Bidang Perkoperasian</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">2.</td>
							<td class="text-truncate">II/2746/QDF/002</td>
							<td class="text-truncate">Fasilitasi dan Pembinaan Koperasi</td>
							<td class="text-truncate">Deputi Bidang Perkoperasian</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">3.</td>
							<td class="text-truncate">II/2746/FAE/003</td>
							<td class="text-truncate">Pemantauan Dan Evaluasi Serta Laporan</td>
							<td class="text-truncate">Deputi Bidang Perkoperasian</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/sub-program.js')}}"></script> -->
@endsection