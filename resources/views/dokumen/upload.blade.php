@extends('./layout')

@section('costom_style_pages')
	<link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
	<style>
		.detail-kode{
			margin-top: 10px;
			font-style: italic;
			font-weight: 400;
		}
		.info-sap{
			margin: 0 10px 0 10px;
			font-style: italic;
		}

		.alert-info{

		}
	</style>
@stop

@section('content_main_pages')
	<div class="box box-default ">
		<div class="box-header with-border">
			<h4 class="box-title">Upload Dokumen Arsip</h4>
		</div>
		<p class="alert alert-default info-sap">
			File SAP yang digunakan diupdate tanggal {{$sap_log['created_at']}}
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</p>
		<div class="box-body">
			<form class="form-horizontal" method="post" action="{{url('dokumen/upload')}}" enctype="multipart/form-data">
				@include($view)
			</form>
		</div><!-- /.box -->
	</div>
@stop

@section('costom_js_pages')
	@include('checklist._script')
@stop