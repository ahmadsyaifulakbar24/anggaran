@extends('layouts/app')

@section('title','Akun Asdep')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Akun Asdep</h4>
			@if(session("role") == "deputi")
			<a href="{{url('akun-asdep/create')}}" class="btn btn-primary create mb-1">Buat Akun Asdep</a>
			@endif
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Nama</th>
							<th class="text-truncate">Username</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/akun-asdep.js')}}"></script>
@endsection