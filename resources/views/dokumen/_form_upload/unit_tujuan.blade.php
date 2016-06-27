<div class="form-group">
	<label for="" class="col-sm-3 control-label">Tujuan Surat</label>
	<div class="col-md-6">
		<select name="unit_tujuan" class="form-control select2" id="" style="width: 90%;">
			<option value="" selected></option>
			@foreach($unit_tujuan as $tujuan_surat)
				@if($tujuan_surat['id'] != '1')
					<option value="{{$tujuan_surat['id']}}">({{$tujuan_surat['singkatan']}}) {{$tujuan_surat['nama_unit']}}</option>
				@endif
			@endforeach
		</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
	</div>
</div>