@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Dashboard</h4>
		</div>
		<div class="row">
			@if(session("role") == "deputi")
			<div class="col-md-6 col-xl-4 mb-4">
				<a href="{{url('akun-asdep')}}" class="card card-custom">
					<div class="card-body">
						<h6>Akun Asdep</h6>
						<div class="d-flex justify-content-between align-items-center">
							<i class="mdi mdi-apps mdi-36px"></i>
							<h5 class="mb-0" id="realisasi_anggaran"></h5>
						</div>
						<h5 class="text-secondary font-weight-normal text-right" id="persentase_anggaran"></h5>
					</div>
				</a>
			</div>
			@endif
			@if(session("role") == "admin")
			<div class="col-md-6 col-xl-4 mb-4">
				<a href="{{url('program')}}" class="card card-custom">
					<div class="card-body">
						<h6>Program</h6>
						<div class="d-flex justify-content-between align-items-center">
							<i class="mdi mdi-apps mdi-36px"></i>
							<h5 class="mb-0" id="realisasi_anggaran"></h5>
						</div>
						<h5 class="text-secondary font-weight-normal text-right" id="persentase_anggaran"></h5>
					</div>
				</a>
			</div>
			@endif
			@if(session("role") == "deputi")
			<div class="col-md-6 col-xl-4 mb-4">
				<a href="{{url('kegiatan')}}" class="card card-custom">
					<div class="card-body">
						<h6>Kegiatan</h6>
						<div class="d-flex justify-content-between align-items-center">
							<i class="mdi mdi-apps mdi-36px"></i>
							<h5 class="mb-0" id="realisasi_anggaran"></h5>
						</div>
						<h5 class="text-secondary font-weight-normal text-right" id="persentase_anggaran"></h5>
					</div>
				</a>
			</div>
			@endif
			<div class="col-md-6 col-xl-4 mb-4">
				<a href="{{url('rancangan-anggaran')}}" class="card card-custom">
					<div class="card-body">
						<h6>Rancangan Anggaran</h6>
						<div class="d-flex justify-content-between align-items-center">
							<i class="mdi mdi-apps mdi-36px"></i>
							<h5 class="mb-0" id="realisasi_anggaran"></h5>
						</div>
						<h5 class="text-secondary font-weight-normal text-right" id="persentase_anggaran"></h5>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/dashboard.js')}}"></script> -->
@endsection