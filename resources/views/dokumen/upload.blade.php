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
	</style>
@stop

@section('content_main_pages')
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Upload Dokumen Arsip</h3>
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