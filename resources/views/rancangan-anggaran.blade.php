@extends('layouts/app')

@section('title','Rancangan Anggaran')

@section('content')
	<div class="container">
		<div class="d-sm-flex justify-content-between align-items-center mb-2">
			<h4>Rancangan Anggaran</h4>
			<div class="text-right">
				<a href="{{url('rancangan-anggaran/create')}}" class="btn btn-sm btn-primary create mb-1">Buat Kegiatan</a>
				<button class="btn btn-sm btn-outline-primary view mb-1" data-toggle="modal" data-target="#modal-view">View Sebagai</button>
				<button class="btn btn-sm btn-outline-primary export mb-1">Export Excel</button>
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
					<input type="search" class="form-control form-control-sm" placeholder="Cari Nama Kegiatan">
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
							<th class="text-truncate">Status</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<tbody id="table">
						<tr class="deputi2 asdep2 disetujui">
							<td class="text-center">1.</td>
							<td class="text-truncate">II/2746/BDF/001/051</td>
							<td class="text-truncatee"><a href="{{url('rancangan-anggaran/1')}}">Pengembangan pembiayaan Alternatif Non-bank bagi koperasi</a></td>
							<td class="text-truncate">100 Koperasi</td>
							<td class="text-right">871.900.000</td>
							<td class="text-truncate unit">Deputi Usaha Mikro</td>
							<td class="text-truncate pengguna">Asdep Pengembangan Mikro Daerah</td>
							<td class="text-success">Disetujui</td>
							<td></td>
						</tr>
						<tr class="deputi1 asdep1 ditolak">
							<td class="text-center">2.</td>
							<td class="text-truncate">II/2746/BDF/001/052</td>
							<td class="text-truncatee"><a href="{{url('rancangan-anggaran/1')}}">Pengembangan dan Penguatan Peran Badan Layanan Umum Pembiayaan bagi Koperasi</a></td>
							<td class="text-truncate">100 Koperasi</td>
							<td class="text-right">71.920.000</td>
							<td class="text-truncate unit">Deputi Perkoperasian</td>
							<td class="text-truncate pengguna">Asdep Perkoperasian Syariah</td>
							<td class="text-danger">Ditolak</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-primary accept mr-2">Setujui</button>
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr class="deputi2 asdep2 pending">
							<td class="text-center">3.</td>
							<td class="text-truncate">II/2746/BDF/001/053</td>
							<td class="text-truncatee"><a href="{{url('rancangan-anggaran/1')}}">Peningkatan Akses Permodalan Koperasi melalui Penjaminan</a></td>
							<td class="text-truncate">100 Koperasi</td>
							<td class="text-right">171.900.000</td>
							<td class="text-truncate unit">Deputi Usaha Mikro</td>
							<td class="text-truncate pengguna">Asdep Pengembangan Mikro Daerah</td>
							<td class="text-warning">Pending</td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-primary accept mr-2">Setujui</button>
									<button class="btn btn-sm btn-danger decline mr-2">Tolak</button>
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
	<div class="modal" id="modal-view" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title" id="exampleModalLabel">View Sebagai</h5>
	                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button> -->
	            </div>
	            <form>
		            <div class="modal-body">
						<div class="form-group">
							<label for="title">Akun</label>
							<select class="custom-select" id="view-as" role="button">
								<option class="option-deputi" value="all-deputi">Semua Deputi</option>
								<option class="option-deputi" value="deputi1">Deputi Perkoperasian</option>
								<option class="option-deputi" value="deputi2">Deputi Usaha Mikro</option>
								<option class="option-asdep" value="all-asdep">Semua Asdep</option>
								<option class="option-asdep" value="asdep1">Asdep Perkoperasian Syariah</option>
								<option class="option-asdep" value="asdep2">Asdep Pengembangan Mikro Daerah</option>
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
@endsection

@section('script')
	<!-- <script src="{{asset('api/rancangan-anggaran.js')}}"></script> -->
	<script>
		if (role == 'admin' || role == 'deputi') {
			$('.modal').modal('show')
			if (role == 'admin') {
				$('.option-asdep').remove()
			} else {
				$('.option-deputi').remove()
			}
			$('form').submit(function(e) {
				e.preventDefault()
				$('#card').show()
				$('.modal').modal('hide')
				let val = $('#view-as').val()
				let text = $('#view-as option:selected').text()
				$('#view').html(text)
				if (val == 'all-deputi') {
					$('.deputi1').show()
					$('.deputi2').show()
				} else if (val == 'deputi1') {
					$('.deputi1').show()
					$('.deputi2').hide()
				} else if (val == 'deputi2') {
					$('.deputi1').hide()
					$('.deputi2').show()
				} else if (val == 'all-asdep') {
					$('.asdep1').show()
					$('.asdep2').show()
				} else if (val == 'asdep1') {
					$('.asdep1').show()
					$('.asdep2').hide()
				} else if (val == 'asdep2') {
					$('.asdep1').hide()
					$('.asdep2').show()
				}
			})
		} else {
			$('#card').show()
		}

		if (role == 'admin') {
			$('.create').remove()
			$('.edit').remove()
			$('.delete').remove()
		} else if (role == 'deputi') {
			$('.create').remove()
			$('.edit').remove()
			$('.delete').remove()
			$('.accept').remove()
			$('.pending').remove()
			$('.unit').remove()
			$('.modal').modal('show')
		} else if (role == 'asdep') {
			$('.view').remove()
			$('.accept').remove()
			$('.decline').remove()
			$('.unit').remove()
			$('.pengguna').remove()
		}
	</script>
@endsection