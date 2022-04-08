@extends('layouts/app')

@section('title','KRO')

@section('content')
	<div class="container">
		<div class="d-flex align-items-end mb-2">
			<h4><a class="text-dark" id="back"><i class="mdi mdi-arrow-left"></i></a>KRO</h4>
		</div>
		<div class="d-flex justify-content-between align-items-end mb-2">
			<div class="card card-custom">
				<div class="card-body">
					<h6>Total Anggaran ACC</h6>
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="mb-0" id="total_budged">Rp0</h5>
					</div>
				</div>
			</div>
			<div>
				<a href="{{url('asdep/kro/create/'.$user_activity_id)}}" class="btn btn-primary create none">Buat KRO</a>
			</div>
		</div>
		<div class="card card-custom">
			<div class="table-responsive">
				<table class="table table-middle">
					<thead>
						<tr>
							<th class="text-truncate">No.</th>
							<th class="text-truncate">Kode</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Tipe KRO</th>
							<th class="text-truncate">Satuan KRO</th>
							<th class="option"></th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
	    <div class="modal-sm modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header border-bottom-0">
	                <h5 class="modal-title">Hapus KRO</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
	                    <i class="mdi mdi-close pr-0"></i>
	                </button>
	            </div>
	            <div class="modal-body">
	            	Anda yakin ingin hapus <b id="title"></b>?
	            </div>
	            <div class="modal-footer border-top-0">
	                <button class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-danger" id="delete">Hapus</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('script')
	<script>
		const user_activity_id = {{$user_activity_id}}
		$.ajax({
		    url: `${root}/api/work_plan/breadcrumb`,
		    type: 'GET',
		    data: {
		        breadcrumb_type: 'kro',
		        user_activity_id
		    },
		    success: function(result) {
		        // console.log(result.data)
		        let value = result.data
		        $('#back').attr('href', `${root}/asdep/kegiatan/${value.user_program.user_program_id}`)
		    },
		    error: function(xhr) {
		        // console.log(xhr)
		    }
		})
	</script>
	<script src="{{asset('api/asdep/kro.js')}}"></script>
@endsection