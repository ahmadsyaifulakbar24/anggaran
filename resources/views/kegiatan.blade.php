@extends('layouts/app')

@section('title','Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Kegiatan</h4>
			<a href="{{url('kegiatan/create/'.$id_program)}}" class="btn btn-sm btn-primary create mb-1">Buat Kegiatan</a>
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
					<tbody id="table">
						<tr>
							<td class="text-center">1.</td>
							<td class="text-truncate">II/2746</td>
							<td class="text-truncate">Pembiayaan dan Penjaminan Perkoperasian</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">2.</td>
							<td class="text-truncate">II/4442</td>
							<td class="text-truncate">Pengembangan dan Pembaruan Perkoperasian</td>
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
	<!-- <script src="{{asset('api/kegiatan.js')}}"></script> -->
@endsection