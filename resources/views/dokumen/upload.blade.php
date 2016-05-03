@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
	<style>
		.detail-kode{
			margin-top: 10px;
			font-style: italic;
			font-weight: 400;
		}
		.info-sap{
			padding-top: 10px;
		}
	</style>
@stop

@section('content_main_pages')
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h4 class="box-title">Upload Dokumen Arsip</h4>
				<br>
				<p class="alert alert-info info-sap">SAP<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            </div>
			<div class="box-body">
				<form class="form-horizontal" method="post" action="{{url('dokumen/upload')}}" enctype="multipart/form-data">
					@include($view)
				</form>
			</div><!-- /.box -->
		</div>
@stop

@section('costom_js_pages')
	@include('dokumen.scriptUpload')
@stop