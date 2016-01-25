@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Unit</h3>
	</div>
	<div class="box-body">
	@if (count($errors) > 0)
		<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Mohon Periksa Kembali input.
		</div>
	@endif
		<form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('unit/tambah-unit')}}}">
		{{csrf_field()}}
			<input type="hidden" name="id" class="form-control" value="{{{$edit['id'] or ''}}}">
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nama Unit</label>
				<div class="col-md-5">
					<input type="text" name="nama_unit" class="form-control" value="{{{$edit['nama_unit'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Singkatan</label>
				<div class="col-md-2">
					<input type="text" name="singkatan" class="form-control" value="{{{$edit['singkatan'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Unit Atasan</label>
				<div class="col-md-5">
					<select name="unit_atasan" id="" class="select-pl"  style="width: 90%;">
						<option value="{{{$edit['unit_id'] or ''}}}">{{{$edit['unit']['nama_unit'] or ''}}} </option>
						@foreach($unit as $unit)
						<option value="{{$unit['id']}}">{{$unit['nama_unit']}}</option>
						@endforeach
					</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
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