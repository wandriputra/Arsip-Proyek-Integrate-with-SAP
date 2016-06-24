<!-- Aasal Surat-->
<div class="form-group">
	<label for="" class="col-sm-3 control-label">Asal Surat</label>
	<div class="col-md-8">
		<select name="unit_asal" class="form-control select2 asal_surat" style="width: 90%;">
			@foreach($unit as $asal_surat)
				@if($asal_surat['id'] != '1')
				<option value="{{$asal_surat['id']}}" 
					@if(Auth::user()->personil->unit->id == $asal_surat['id']) 
						{{'selected'}} 
					@endif >
					({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
				@endif
			@endforeach
		</select>
		<a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
	</div>
</div>

<!-- <input type="hidden" name="unit_asal" value="{{Auth::user()->personil->unit->id}}"> -->