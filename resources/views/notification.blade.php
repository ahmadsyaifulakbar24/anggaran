@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<h5 class="mb-3">Notifikasi</h5>
		<section class="mb-3" id="earlier">
			<h6>Terbaru</h6>
			<div class="d-flex border-bottom pb-2 my-2">
				<div class="mt-1">
					<img src="https://ui-avatars.com/api/?name=Deputi+Bidang}}" class="avatar rounded-circle" width="40">
				</div>
				<div class="ml-3">
					<div class="font-weight-bold">Deputi Bidang Perkoperasian</div>
					<div>Memberikan komentar di kegiatan <i>Pengelolaan Layanan Umum dan Keuangan Bidang Perkoperasian.</i></div>
					<small class="text-secondary">11 Sep 2021</small>
				</div>
			</div>
			<div class="d-flex border-bottom pb-2 my-2">
				<div class="mt-1">
					<img src="https://ui-avatars.com/api/?name=Admin" class="avatar rounded-circle" width="40">
				</div>
				<div class="ml-3">
					<div class="font-weight-bold">Admin</div>
					<div>Menolak kegiatan <i>Peningkatan Akses Permodalan Koperasi melalui Penjaminan.</i></div>
					<small class="text-secondary">12 Sep 2021</small>
				</div>
			</div>
			<div class="d-flex pb-2 my-2">
				<div class="mt-1">
					<img src="https://ui-avatars.com/api/?name=Deputi+Bidang}}" class="avatar rounded-circle" width="40">
				</div>
				<div class="ml-3">
					<div class="font-weight-bold">Deputi Bidang Perkoperasian</div>
					<div>Mengajukan kegiatan <i>Pengelolaan Layanan Umum dan Keuangan Bidang Perkoperasian.</i></div>
					<small class="text-secondary">11 Sep 2021</small>
				</div>
			</div>
			<h6>Telah dibaca</h6>
		</section>
		<section id="latest">
			<div class="d-flex border-bottom pb-2 my-2">
				<div class="mt-1">
					<img src="https://ui-avatars.com/api/?name=Deputi+Bidang}}" class="avatar rounded-circle" width="40">
				</div>
				<div class="ml-3">
					<div class="font-weight-bold">Deputi Bidang Perkoperasian</div>
					<div>Menyetujui kegiatan <i>Pengelolaan Layanan Umum dan Keuangan Bidang Perkoperasian.</i></div>
					<small class="text-secondary">11 Sep 2021</small>
				</div>
			</div>
			<div class="d-flex pb-2 my-2">
				<div class="mt-1">
					<img src="https://ui-avatars.com/api/?name=Asdep+Perkoperasian" class="avatar rounded-circle" width="40">
				</div>
				<div class="ml-3">
					<div class="font-weight-bold">Asdep Perkoperasian Syariah</div>
					<div>Membuat kegiatan <i>Pengelolaan Layanan Umum dan Keuangan Bidang Perkoperasian.</i></div>
					<small class="text-secondary">10 Sep 2021</small>
				</div>
			</div>
		</section>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/notification.js')}}"></script>
@endsection