@extends('layouts/app')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4 id="title"></h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-group">
					<label for="code_program">Kode</label>
					<input class="form-control" id="code_program"></select>
				</div>
				<div class="form-group">
					<label for="parent_id">Keterangan</label>
					<input class="form-control" id="description"></select>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('api/create-program.js')}}"></script> -->
	<script>
		let type = '{{$type}}'
		if (type == 'program') {
			$('title').prepend('Buat Program')
			$('#title').html('Buat Program')
		}
		if (type == 'sub') {
			$('title').prepend('Buat Sub Program')
			$('#title').html('Buat Sub Program')
		}
		if (type == 'kode') {
			$('title').prepend('Buat Kode Program')
			$('#title').html('Buat Kode Program')
		}
		if (type == 'kegiatan') {
			$('title').prepend('Buat Kode Kegiatan')
			$('#title').html('Buat Kode Kegiatan')
		}
	</script>
@endsection