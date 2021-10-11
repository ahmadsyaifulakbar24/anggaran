@extends('layouts/app')

@section('title','Buat Kegiatan')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h4>Buat Kegiatan</h4>
		</div>
		<div class="card card-custom">
			<form class="card-body">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="component_code">Kode Komponen</label>
						<input class="form-control" id="component_code"></select>
						<div class="invalid-feedback"></div>
					</div>
					<div class="form-group col">
						<label for="component_name">Nama Komponen</label>
						<input class="form-control" id="component_name"></select>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="total_target" class="col-form-label">Target</label>
					<div class="form-row">
						<div class="col-6 mb-1">
							<input type="text" class="form-control number" id="total_target" placeholder="Jumlah">
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-6">
							<select class="custom-select" id="unit_target" role="button">
								<option value="" disabled selected>Pilih Satuan</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-sm-6 mb-1">
							<label for="target_id" class="col-form-label">Sasaran</label>
							<select class="custom-select" id="target_id" role="button">
								<option value="" disabled selected>Pilih</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-sm-6">
							<label for="indicator_id" class="col-form-label">Indikator</label>
							<select class="custom-select" id="indicator_id" role="button">
								<option value="" disabled selected>Pilih</option>
							</select>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>
				<!-- <div class="form-group">
					<div class="form-row">
						<div class="col-sm-6 mb-1">
							<label for="target_id" class="col-form-label">Anggaran (RM)</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Rp.</span>
								</div>
								<input type="tel" class="form-control">
							</div>
							<div class="invalid-feedback"></div>
						</div>
						<div class="col-sm-6">
							<label for="indicator_id" class="col-form-label">Anggaran (BLU)</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Rp.</span>
								</div>
								<input type="tel" class="form-control">
							</div>
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<label for="total_target" class="col-form-label">Lokasi</label>
					<div id="province">
						<div class="card card-body location shadow mb-3" data-id="1">
							<div class="form-row">
								<div class="col-md-6 mb-2">
									<select class="custom-select province_id" role="button">
										<option value="" disabled selected>Pilih Lokasi</option>
									</select>
									<div class="invalid-feedback"></div>
								</div>
								<div class="col-md-6">
									<div id="city1">
										<!-- <div class="d-flex align-items-start mb-2">
											<div class="col">
												<div class="row">
													<div class="col-12 mb-2 px-0">
														<select class="custom-select city_id" role="button">
															<option value="" disabled selected>Pilih Kab/Kota</option>
														</select>
														<div class="invalid-feedback">Pilih kab/kota.</div>
													</div>
													<div class="col-12 mb-2 px-0">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1">Rp.</span>
															</div>
															<input type="tel" class="form-control" placeholder="Anggaran (RM)">
														</div>
														<div class="invalid-feedback"></div>
													</div>
													<div class="col-12 mb-2 px-0">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1">Rp.</span>
															</div>
															<input type="tel" class="form-control" placeholder="Anggaran (BLU)">
														</div>
														<div class="invalid-feedback"></div>
													</div>
												</div>
											</div>
											<div class="col-1 pt-1">
												<i class="mdi mdi-18px mdi-trash-can-outline remove-location pr-0" role="button"></i>
											</div>
										</div> -->
									</div>
									<div class="btn btn-block btn-outline-primary align-items-center py-1" onclick="return add_city(1)">Tambah</div>
								</div>
							</div>
						</div>
					</div>
					<div class="btn btn-block btn-outline-primary py-1" onclick="return add_province()">Tambah Lokasi</div>
				</div>
				<div class="form-group">
					<label for="detail">Rincian Detail</label>
					<textarea class="form-control form-control-sm" rows="5" id="detail"></textarea>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<label for="description">Keterangan</label>
					<textarea class="form-control form-control-sm" rows="5" id="description"></textarea>
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" id="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('assets/js/number.js')}}"></script>
	<script>const user_ro_id = {{$user_ro_id}}</script>
	<script src="{{asset('api/asdep/create-komponen.js')}}"></script>
@endsection