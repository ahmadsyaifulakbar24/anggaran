@extends('layouts/app')

@section('title','Rancangan Anggaran')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Rancangan Anggaran</h4>
			<button class="btn btn-sm btn-primary create mb-1">Buat Kegiatan</button>
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Kode Kegiatan</th>
							<th class="text-truncate">Nama Kegiatan</th>
							<th class="text-truncate">Total</th>
							<th class="text-truncate">Target</th>
							<th class="text-truncate">Anggaran</th>
							<th class="text-truncate">Provinsi</th>
							<th class="text-truncate">Kab/Kota</th>
							<th class="text-truncate">Rincian Detail</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Status</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<tbody id="table">
						<tr>
							<td class="text-center">1.</td>
							<td class="text-truncate">4946</td>
							<td class="text-truncate"><a href="javascript:void(0)">Koordinasi Perencanaan</a></td>
							<td class="text-truncate"></td>
							<td class="text-truncate"></td>
							<td class="text-truncate">Rp7.151.710.000</td>
							<td class="text-truncate"></td>
							<td class="text-truncate"></td>
							<td></td>
							<td></td>
							<td class="text-success">Disetujui</td>
							<td class="d-flex">
								<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
							</td>
						</tr>
						<tr class="pending">
							<td class="text-center">2.</td>
							<td class="text-truncate">EBA</td>
							<td class="text-truncate"><a href="javascript:void(0)">Layanan Dukungan Manajemen Internal</a></td>
							<td class="text-truncate">1</td>
							<td class="text-truncate">Layanan</td>
							<td class="text-truncate">Rp1.350.000.000</td>
							<td class="text-truncate">Jawa Barat</td>
							<td class="text-truncate">Kab. Tasikmalaya</td>
							<td>Rincian Detail</td>
							<td>Keterangan</td>
							<td class="text-warning">Pending</td>
							<td class="d-flex">
								<button class="btn btn-sm btn-primary accept mr-2">Setujui</button>
								<button class="btn btn-sm btn-danger decline mr-2">Tolak</button>
								<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
								<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/rancangan-anggaran.js')}}"></script> -->
	<script>
		if (role == 'admin') {
			$('.create').remove()
			$('.edit').remove()
			$('.delete').remove()
		} else if (role == 'deputi') {
			$('.create').remove()
			$('.edit').remove()
			$('.delete').remove()
			$('.pending').remove()
		} else if (role == 'asdep') {
			$('.accept').remove()
			$('.decline').remove()
		}
	</script>
@endsection