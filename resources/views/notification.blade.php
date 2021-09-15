@extends('layouts/app')

@section('title','Notifikasi')

@section('content')
	<div class="container">
		<h4 class="mb-3">Notifikasi</h4>
		<section class="none mb-3" id="latest">
			<h6 class="none">Terbaru</h6>
		</section>
		<section id="oldest">
			<h6 class="none">Telah dilihat</h6>
		</section>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/notification.js')}}"></script>
@endsection