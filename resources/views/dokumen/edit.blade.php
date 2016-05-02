@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop

@section('content_main_pages')
<div class="box box-default ">
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
		<li class="active">{{$dokumen['nama_dokumen']}}</li>
	</ol>
	<div class="box-body">
		<form class="form-horizontal" method="post" action="{{url('dokumen/edit')}}" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="col-sm-3 control-label">Asal Surat</label>
		<div class="col-md-8">
			<select name="unit_asal" class="form-control select2" id="asal_surat" style="width: 90%;">
				@foreach($unit as $asal_surat)
					@if($asal_surat['id'] != '1')
					<option value="{{$asal_surat['id']}}" @if($dokumen->asal_surat->id == $asal_surat['id']) {{'selected'}} @endif >{{$asal_surat['nama_unit']}}</option>
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

	<div class="form-group">
  		<label for="exampleInputFile" class="col-sm-3 control-label">No Dokumen</label>
  		<div class="col-sm-5">
  			<input type="text" id="no_file" class="form-control" value="{{$dokumen->no_dokumen}}">
		</div>
		<div class="col-sm-1">
			<i class='fa fa-check bg-green'></i>
		</div>
	</div>
	<div class="form-group">
  		<label for="exampleInputFile" class="col-sm-3 control-label">Nama Dokumen</label>
  		<div class="col-sm-8">
  			<input type="text" id="nama_file" class="form-control" value="{{$dokumen->nama_dokumen}}">
		</div>
		<div class="col-sm-1">
			<i class='fa fa-check bg-green'></i>
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
	<div class="form-group">
		<label class="col-sm-3 control-label">Tembusan</label>
		<div class="col-sm-9">
			<select class="form-control select2" name="tembusan" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
				@foreach($unit_tujuan as $tembusan)
					<option value="{{$tembusan['id']}}">{{$tembusan['nama_unit'].' ('.$tembusan['singkatan'].')'}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-3 control-label">Lokator Penyimpanan</label>
		<div class="col-md-3">
			<input type="text" name="lokasi_file" placeholder="Lokator Penyimpanan" class="form-control" value="">
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
		</form>
		<div class="active tab-pane" id="file_pdf">
			<object data="{{url('/dokumen/file')}}/{{$dokumen['id']}}" type="application/pdf" width="100%" height="300">
				<p>Pastikan anda telah melakukan update browser ke versi terbaru untuk menikmati fitur <b>Aplikasi Arsip Indarung VI</b> secara penuh. Dan jika masih belum bisa membuka file ini lewat browser maka matikan Aplikasi Download yang ada pada Komputer / Laptop. File : <a href="{{url('/dokumen/file')}}/{{$dokumen['id']}}">{{$dokumen['nama_dokumen']}}</a></p>
			</object>
		</div>
	</div>
	<div class="box-footer">
		
	</div>
</div>

@stop

@section('costom_js_pages')
	@include('dokumen.scriptUpload')
@stop