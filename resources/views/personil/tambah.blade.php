@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Personil</h3>
	</div>
	<div class="box-body">
	@if (count($errors) > 0)
		<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Mohon Periksa Kembali input.
		</div>
	@endif
		<form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('personil/tambah-personil')}}}">
		{{csrf_field()}}
			<input type="hidden" name="id" class="form-control" value="{{{$edit['id'] or ''}}}">
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">NIK</label>
				<div class="col-md-3">
					<input type="text" name="nik" class="form-control" value="{{{$edit['nik'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nama</label>
				<div class="col-md-5">
					<input type="text" name="nama_personil" class="form-control" value="{{{$edit['nama_personil'] or ''}}}">
				</div>
				<label for="" class="col-sm-1 control-label">Singkatan</label>
				<div class="col-md-2">
					<input type="text" name="singkatan" class="form-control" value="{{{$edit['singkatan'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Email</label>
				<div class="col-md-5">
					<input type="text" name="email" class="form-control" value="{{{$edit['email'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Unit</label>
				<div class="col-md-5">
					<select name="unit_id" id="" class="select-pl"  style="width: 90%;">
						<option value="{{{$edit['unit_id'] or ''}}}">{{{$edit['unit']['nama_unit'] or ''}}} </option>
						@foreach($unit as $unit)
						<option value="{{$unit['id']}}">{{$unit['nama_unit']}}</option>
						@endforeach
					</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Jabatan</label>
				<div class="col-md-5">
					<select name="jabatan_id" id="" class="select-pl"  style="width: 90%;">
						<option value="{{{$edit['jabatan_id'] or ''}}}">{{{$edit['jabatan']['nama_jabatan'] or ''}}} </option>
						@foreach($jabatan as $jabatan)
						<option value="{{$jabatan['id']}}">{{$jabatan['nama_jabatan']}}</option>
						@endforeach
					</select> <a href="{{url('jabatan/tambah-jabatan')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Atasan</label>
				<div class="col-md-5">
					<select name="atasan_id" id="" class="select-pl"  style="width: 90%;">
						<option value="{{{$edit['atasan_id'] or ''}}}"> {{{$edit['atasan']['nama_personil'] or ''}}}</option>
						@foreach($atasan as $atasan)
						<option value="{{$atasan['id']}}">{{$atasan['nama_personil']}}</option>
						@endforeach
					</select> <a href="{{url('personil/tambah-personil')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
	</div>
	<div class="box-footer">
		<div class="">
			<button type="reset" class="btn btn-default col-md-2">Reset</button>
			<button type="submit" class="btn btn-info col-md-2 pull-right">Tambah</button>
		</div>
	</div><!-- /.box-footer -->
	</form>
</div>
@stop

@section('costom_js_pages')
	<script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>
	<script src="{{ url('asset/plugins/iCheck/icheck.min.js')}}"></script>
	<script>
		$(function() {
			$(".select-pl").select2(); 
		});
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-red',
			radioClass: 'iradio_minimal-red'
		});
	</script>
@stop