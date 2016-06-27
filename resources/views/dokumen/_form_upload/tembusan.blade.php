<div class="form-group">
	<label class="col-sm-3 control-label">Tembusan</label>
	<div class="col-sm-6">
		<select class="form-control select2" name="tembusan[]" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
			@foreach($unit_tujuan as $tembusan)
				<option value="{{$tembusan['id']}}">{{$tembusan['nama_unit'].' ('.$tembusan['singkatan'].')'}}</option>
			@endforeach
		</select>
	</div>
</div>