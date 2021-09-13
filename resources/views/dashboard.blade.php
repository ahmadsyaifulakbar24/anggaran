@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<section class="mb-4" id="admin">
			<h5>Deputi Bidang Perkoperasian</h5>
			<table class="w-25">
				<tr>
					<td class="text-truncate">Total Anggaran ACC</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp30.000.000.000</td>
				</tr>
				<tr>
					<td class="text-truncate">Total Anggaran Pengajuan</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp300.000.000.000</td>
				</tr>
			</table>
			<div class="row mt-3">
				@for($i=1;$i<=3;$i++)
				<div class="col-md-6 col-xl-4 mb-3">
					<div class="card card-custom">
						<div class="card-header">
							<h6 class="mb-0">Asdep Perkoperasian Syariah</h6>
						</div>
						<div class="table-responsive py-3">
							<table class="w-100">
								<tr>
									<td class="text-truncate">Anggaran ACC</td>
									<td class="px-2">:</td>
									<td class="text-right">Rp10.000.000.000</td>
								</tr>
								<tr>
									<td class="text-truncate">Anggaran Pengajuan</td>
									<td class="px-2">:</td>
									<td class="text-right">Rp100.000.000.000</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</section>
		<section class="border-top mb-4" id="deputi">
			<h5>Deputi Bidang Usaha Mikro</h5>
			<table class="w-25">
				<tr>
					<td class="text-truncate">Total Anggaran ACC</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp45.000.000.000</td>
				</tr>
				<tr>
					<td class="text-truncate">Total Anggaran Pengajuan</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp360.000.000.000</td>
				</tr>
			</table>
			<div class="row mt-3">
				@for($i=1;$i<=3;$i++)
				<div class="col-md-6 col-xl-4 mb-3">
					<div class="card card-custom">
						<div class="card-header">
							<h6 class="mb-0">Asdep Pengembangan Mikro Daerah</h6>
						</div>
						<div class="table-responsive py-3">
							<table class="w-100">
								<tr>
									<td class="text-truncate">Anggaran ACC</td>
									<td class="px-2">:</td>
									<td class="text-right">Rp15.000.000.000</td>
								</tr>
								<tr>
									<td class="text-truncate">Anggaran Pengajuan</td>
									<td class="px-2">:</td>
									<td class="text-right">Rp120.000.000.000</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</section>
		<section class="pb-3 mb-4" id="asdep">
			<h5>Asdep Perkoperasian Syariah</h5>
			<table class="w-25">
				<tr>
					<td class="text-truncate">Total Anggaran ACC</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp10.000.000.000</td>
				</tr>
				<tr>
					<td class="text-truncate">Total Anggaran Pengajuan</td>
					<td class="px-2">:</td>
					<td class="text-right">Rp100.000.000.000</td>
				</tr>
			</table>
		</section>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/dashboard.js')}}"></script>
@endsection