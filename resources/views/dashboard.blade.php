@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<div class="mb-4">
			<h4>Halo, <span class="name"></span></h4>
			<h6>Rancangan Perencanaan dan Anggaran</h6>
			<h6>Kementerian Koperasi dan UKM RI Tahun 2022</h6>
		</div>
		<div class="row">
			@if(session("role") == "deputi")
			<div class="col-md-6 col-xl-4 mb-4">
				<a href="{{url('akun-asdep')}}" class="card card-custom">
					<div class="card-body">
						<h6>Buat Akun Asdep</h6>
						<div class="d-flex justify-content-between align-items-center">
							<i class="mdi mdi-apps mdi-36px"></i>
							<h5 class="mb-0" id="realisasi_anggaran"></h5>
						</div>
						<h5 class="text-secondary font-weight-normal text-right" id="persentase_anggaran"></h5>
					</div>
				</a>
			</div>
			@endif
			@if(session("role") == "admin" || session("role") == "deputi")
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