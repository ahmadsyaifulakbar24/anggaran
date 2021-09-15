@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<div id="data"></div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script src="{{asset('api/dashboard.js')}}"></script>
@endsection