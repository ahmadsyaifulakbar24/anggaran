@extends('layouts/app')

@section('title','Kode Program')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Kode Program</h4>
			<a href="{{url('program/create/kode/'.$kode_program)}}" class="btn btn-sm btn-primary create mb-1">Buat Kode Program</a>
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
							<td class="text-truncate">II/2746/BDF</td>
							<td class="text-truncate"><a href="{{url('program/1/2/3')}}">Fasilitasi dan Pembinaan Koperasi</a></td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">2.</td>
							<td class="text-truncate">II/2746/QDF</td>
							<td class="text-truncate"><a href="{{url('program/1/2/3')}}">Fasilitasi dan Pembinaan Koperasi</a></td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">3.</td>
							<td class="text-truncate">II/2746/FAE</td>
							<td class="text-truncate"><a href="{{url('program/1/2/3')}}">Pemantauan Dan Evaluasi Serta Laporan</a></td>
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
	<script>
		if (role == 'admin') {
			$('table a').addClass('text-dark')
			$('table a').attr('href', 'javascript:void(0)')
		}
	</script>
@endsection