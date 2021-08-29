@extends('layouts/app')

@section('title','Akun Asdep')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Akun Asdep</h4>
			<button class="btn btn-sm btn-primary create mb-1">Buat Akun</button>
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Nama</th>
							<th class="text-truncate">Username</th>
							<th class="text-truncate">Unit</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="table">
						<tr>
							<td class="text-center">1.</td>
							<td class="text-truncate">Asdep</td>
							<td class="text-truncate">asdep</td>
							<td class="text-truncate">Asdep Usaha Mikro</td>
							<td class="d-flex">
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
	<!-- <script src="{{asset('api/akun-asdep.js')}}"></script> -->
@endsection