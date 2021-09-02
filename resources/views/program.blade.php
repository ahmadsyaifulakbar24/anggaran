@extends('layouts/app')

@section('title','Program')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Program</h4>
			<a href="{{url('program/create')}}" class="btn btn-sm btn-primary create mb-1">Buat Program</a>
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
							<td class="text-truncate">I</td>
							<td class="text-truncate"><a href="{{url('program/1')}}">Program Dukungan Manajemen</a></td>
							<td>
								<div class="d-flex">
									<button class="btn btn-sm btn-outline-primary edit mr-2">Ubah</button>
									<button class="btn btn-sm btn-outline-danger delete">Hapus</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-center">2.</td>
							<td class="text-truncate">II</td>
							<td class="text-truncate"><a href="{{url('program/2')}}">Program Kewirausahaan, UMKM dan Koperasi</a></td>
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
	<!-- <script src="{{asset('api/program.js')}}"></script> -->
@endsection