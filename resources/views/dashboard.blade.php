@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		@if(session("role") != "admin")
		<div class="card">
			<div class="card-body">
				@if(session("role") == "deputi")
				<h5>Statistik Deputi Usaha Mikro</h5>
				@elseif(session("role") == "asdep")
				<h5>Statistik Asisten Deputi Pengembangan Mikro Daerah</h5>
				@endif
				<canvas id="chartAnggaran"></canvas>
			</div>
		</div>
		@endif
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/chart.min.js')}}"></script>
	<script src="{{asset('api/dashboard.js')}}"></script>
@endsection