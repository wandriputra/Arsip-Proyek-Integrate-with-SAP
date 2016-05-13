@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
@stop

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
<div class="row">
	<div class="col-md-9">
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Upload Dokumen Arsip</h3>
            </div>
			<div class="box-body">
				<form class="form-horizontal" method="post" action="{{url('hrga/upload-excel')}}" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="box-body">
						<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-2 control-label">Input File</label>
                      		<div class="col-sm-10">
                      			<input type="file" id="exampleInputFile" name="format1">
                      			<p class="help-block">*Upload File CN52N Export SAP format *.CSV</p>
                    		</div>
                    	</div>
						<div class="box-footer">
							<div class="">
								<button type="reset" class="btn btn-default col-md-2">Reset</button>
								<button type="submit" class="btn btn-success col-md-2 pull-right">Upload</button>
							</div>
						</div><!-- /.box-footer -->
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div>
</div>
@stop

@section('costom_js_pages')
<!-- Select2 -->
    <script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>
	    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    })</script>
@stop