@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Actifity</h3>
	</div>
	<div class="box-body">
	@if (count($errors) > 0)
		<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Mohon Periksa Kembali input.
		</div>
	@endif
		<form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('data/tambah-actifity')}}}">
			{{csrf_field()}}
			<input type="hidden" name="prev_url" value="{{URL::previous()}}">
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Unit Dokumen</label>
				<div class="col-md-6">
					<select name="unit_id" class="form-control select2" id="" style="width: 90%;">
						@foreach($unit as $unit)
						<option value="{{$unit['id']}}" @if(Auth::user()->personil->unit->id == $unit['id']) {{'selected'}} @endif >({{$unit['singkatan']}}) {{$unit['nama_unit']}}</option>
						@endforeach
					</select><a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Jenis Dokumen</label>
				<div class="col-md-5">
					<select name="jenis_id" class="form-control select2" id="">
						@foreach($jenis_dokumen as $jenis_dokumen)
						<option value="{{$jenis_dokumen['id']}}">{{$jenis_dokumen['nama_jenis']}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nama Actifity</label>
				<div class="col-md-7">
					<input type="text" name="nama_actifity" class="form-control" value="{{{$edit['nama_sub'] or ''}}}">
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
	<script>
		$(function() {
			$(".select2").select2(); 
		});
	</script>
@stop