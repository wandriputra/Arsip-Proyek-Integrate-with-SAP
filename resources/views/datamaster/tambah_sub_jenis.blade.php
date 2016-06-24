@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Sub Jenis Dokumen</h3>
	</div>
	<div class="box-body">
		<form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('data/insert-sub-jenis')}}}">
			{{csrf_field()}}

			<input type="hidden" name="prev_url" value="{{URL::previous()}}">
			
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nama Unit</label>
				<div class="col-md-8">
					<select name="unit_asal" class="form-control select2" id="nama_unit" style="width: 90%;">
						@foreach($unit as $asal_surat)
							@if($asal_surat['id'] != '1')
							<option value="{{$asal_surat['id']}}" @if(Auth::user()->personil->unit->id == $asal_surat['id']) {{'selected'}} @endif >({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
							@endif
						@endforeach
					</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Actifity Dokumen</label>
				<div class="col-md-8">
					<select name="actifity_id" class="form-control select2" id="actifity" style="width:90%">
					</select><a href="{{url('data/tambah-actifity')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Jenis Dokumen</label>
				<div class="col-md-7">
					<input type="text" name="nama_sub" class="form-control" placeholder= "Choose an option…" value="{{{$edit['nama_sub'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Singkatan</label>
				<div class="col-md-3">
					<input type="text" name="singkatan" class="form-control" value="{{{$edit['singkatan'] or ''}}}" placeholder="Singkatan">
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
			$(".select2").select2({
				placeholder: "Type Something ....."
			});

			populateActifity();

			$('#nama_unit').change(function(){
				populateActifity();
			});

			function populateActifity(){
				unit_id = $('#nama_unit').val();
				$.getJSON("{{url('dokumen/ajax-actifity')}}"+"/"+unit_id, function(data) {
					var options = '<option value=""></option>';
				    for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
					}
					$('#actifity option').remove();
					$('#actifity').append(options);
					
				});
			}
			
		});

		
	</script>
@stop