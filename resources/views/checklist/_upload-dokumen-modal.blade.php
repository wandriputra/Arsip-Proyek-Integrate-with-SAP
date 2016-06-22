<form class="form-horizontal" action="{{url('dokumen/upload')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

	<input type="hidden" name="checklist_id" value="{{$checklist_id}}">
	<input type="hidden" name="actifity_id" value="{{$actifity['id']}}">

	<div class="form-group">
		<label for="" class="col-sm-4 control-label">Asal Surat</label>
		<div class="col-md-8">
			<input type="text" disabled="true" class="form-control" value="{{$unit['nama_unit']}}">
			<input type="hidden" name="unit_asal" value="{{$unit['id']}}" class="asal_surat">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label">Jenis Dokumen</label>
		<div class="col-sm-8">
			<input type="text" value="{{$jenis['nama_sub']}}" class="form-control" disabled="true">
			<input type="hidden" name="jenis_dokumen" value="{{$jenis['id']}}" >
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-4 control-label">Kode Klasisfikasi JRA</label>
		<div class="col-md-5">
			<input type="text" name="kode_jra" class="form-control kode" value="{{{$edit['kode'] or old('kode')}}}" placeholder="Kode JRA">
		</div>
		<label class="detail-kode"> </label>
	</div>

	<div class="form-group hide" id="pr_select">
		<label class="col-sm-4 control-label">No PR</label>
		<div class="col-sm-5">
			<!-- <input class="form-control" name="pr"> -->
			<select class="form-control select_pr" name="pr" style="width: 100%;">

			</select>
		</div>
	</div>
	<div class="form-group hide" id="po_select">
		<label class="col-sm-4 control-label">No PO</label>
		<div class="col-sm-5">
			<!-- <input class="form-control select2" name="po"> -->
			<select class="form-control select_po" name="po" style="width: 100%;">
				
			</select>
		</div>
	</div>
	<div class="form-group hide" id="gr_select">
		<label class="col-sm-4 control-label">No GR</label>
		<div class="col-sm-5">
			<select class="form-control select_gr" name="gr" style="width: 100%;">
			
			</select>
		</div>
	</div>

	<div class="form-group hide" id="cd_select">
		<label class="col-sm-4 control-label">Clearing Doc</label>
		<div class="col-sm-5">
			<select class="form-control select_cd" name="cd" style="width: 100%;">
			
			</select>
		</div>
	</div>
	<div class="form-group">
  		<label for="exampleInputFile" class="col-sm-4 control-label">File input</label>
  		<div class="col-sm-8">
  			<input type="file" name="file_pdf">
  			<p class="help-block">*Dokumen hanya dokumen final Format File PDF</p>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-4 control-label">Tujuan Surat</label>
		<div class="col-md-8">
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

	<div class="form-group">
		<label class="col-sm-4 control-label">Tembusan</label>
		<div class="col-sm-8">
			<select class="form-control select2" name="tembusan[]" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
				@foreach($unit_tujuan as $tembusan)
					<option value="{{$tembusan['id']}}">{{$tembusan['nama_unit'].' ('.$tembusan['singkatan'].')'}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-4 control-label">Lokator Penyimpanan</label>
		<div class="col-md-8">
			<input type="text" name="lokasi_file" placeholder="Lokator Penyimpanan" class="form-control" value="">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label">Visibility Dokumen</label>
		<div class="radio">
		@foreach($visibility as $visibility)
			<label>
				<input name="visibility" class="minimal" value="{{$visibility['id']}}" type="radio" checked="">
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

</form>
@include('checklist._script_upload_dokumen')