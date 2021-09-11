@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		@for($is=1;$is<4;$is++)
		<section class="border-bottom pb-3 mb-4">
			<h5 class="mb-3">Statistik Deputi Perkoperasian</h5>
			<div class="row">
				@for($i=1;$i<7;$i++)
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
		@endfor
	</div>
@endsection

@section('script')
	<script src="{{asset('api/dashboard.js')}}"></script>
@endsection