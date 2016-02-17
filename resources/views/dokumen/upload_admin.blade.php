{{csrf_field()}}

<div class="box-body">
	<div class="form-group">
		<label for="" class="col-sm-3 control-label">Asal Surat</label>
		<div class="col-md-8">
			<select name="unit_asal" class="form-control select2" id="asal_surat" style="width: 90%;">
				@foreach($unit as $asal_surat)
					@if($asal_surat['id'] != '1')
					<option value="{{$asal_surat['id']}}" @if(Auth::user()->personil->unit->id == $asal_surat['id']) {{'selected'}} @endif >({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
					@endif
				@endforeach
			</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Actifity</label>
		<div class="col-sm-7">
			<select class="form-control select2" name="actifity" id="actifity" style="width: 90%;">
				
			</select> <a href="{{url('data/tambah-actifity')}}"><i class="fa fa-fw fa-plus"></i></a>
		</div>
	</div>						
	<div class="form-group">
		<label class="col-sm-3 control-label">Jenis Dokumen</label>
		<div class="col-sm-7">
			<select class="form-control select-remote-data" name="sub_jenis_dokumen" id="sub_jenis_dokumen" style="width: 90%;">
				
			</select> <a href="{{url('data/insert-sub-jenis')}}"><i class="fa fa-fw fa-plus"></i></a>
		</div>
	</div>
	<div class="form-group hide" id="pr_select">
		<label class="col-sm-3 control-label">No PR</label>
		<div class="col-sm-3	">
			<!-- <input class="form-control" name="pr"> -->
			<select class="form-control select_pr" name="pr" style="width: 90%;">

			</select>
		</div>
	</div>
	<div class="form-group hide" id="po_select">
		<label class="col-sm-3 control-label">No PO</label>
		<div class="col-sm-3	">
			<!-- <input class="form-control select2" name="po"> -->
			<select class="form-control select_po" name="po" style="width: 90%;">
				
			</select>
		</div>
	</div>
	<div class="form-group hide" id="gr_select">
		<label class="col-sm-3 control-label">No GR</label>
		<div class="col-sm-3	">
			<select class="form-control select_gr" name="gr" style="width: 90%;">
			
			</select>
		</div>
	</div>

	<div class="form-group hide" id="cd_select">
		<label class="col-sm-3 control-label">Clearing Doc</label>
		<div class="col-sm-3	">
			<select class="form-control select_cd" name="cd" style="width: 90%;">
			
			</select>
		</div>
	</div>
	<div class="form-group">
  		<label for="exampleInputFile" class="col-sm-3 control-label">File input</label>
  		<div class="col-sm-9">
  			<input type="file" id="file_pdf" name="file_pdf">
  			<p class="help-block">*Dokumen hanya dokumen final Format File PDF</p>
		</div>
	</div>
	<!-- <div class="form-group">
  		<label for="exampleInputFile" class="col-sm-3 control-label">No File</label>
  		<div class="col-sm-5">
  			<input type="text" id="no_file" class="form-control">
		</div>
		<div class="col-sm-1">
			<i class='fa fa-check bg-green'></i>
		</div>
	</div>
	<div class="form-group">
  		<label for="exampleInputFile" class="col-sm-3 control-label">Nama File</label>
  		<div class="col-sm-5">
  			<input type="text" id="nama_file" class="form-control">
		</div>
		<div class="col-sm-1">
			<i class='fa fa-check bg-green'></i>
		</div>
	</div> -->
	<div class="form-group">
		<label for="" class="col-sm-3 control-label">Tujuan Surat</label>
		<div class="col-md-6">
			<select name="unit_tujuan" class="form-control select2" id="" style="width: 90%;">
				<option value="" selected></option>
				@foreach($unit as $tujuan_surat)
					@if($tujuan_surat['id'] != '1')
						<option value="{{$tujuan_surat['id']}}">({{$tujuan_surat['singkatan']}}) {{$tujuan_surat['nama_unit']}}</option>
					@endif
				@endforeach
			</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Tembusan</label>
		<div class="col-sm-9">
			<select class="form-control select2" name="tembusan" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
				@foreach($unit as $tembusan)
					<option value="{{$tembusan['id']}}">{{$tembusan['nama_unit'].' ('.$tembusan['singkatan'].')'}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Visibility Dokumen</label>
		<div class="radio">
		@foreach($visibility as $visibility)
			<label>
				<input name="visibility" class="minimal" value="{{$visibility['id']}}" checked="" type="radio">
				{{$visibility['jenis_visibility']}}
			</label>
		@endforeach
		</div>
	</div>
	<div class="box-footer">
		<div class="">
			<button type="reset" class="btn btn-default col-md-2">Reset</button>
			<button type="submit" class="btn btn-success col-md-2 pull-right">Upload</button>
		</div>
	</div><!-- /.box-footer -->
</div>