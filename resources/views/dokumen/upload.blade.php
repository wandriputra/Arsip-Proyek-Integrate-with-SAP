@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
@stop

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
<div class="row">
	<div class="col-md-3">	
		<div class="box box-primary">
			<div class="box-body">
			
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-md-9">
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Upload Dokumen Arsip</h3>
            </div>
			<div class="box-body">
				<form class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="jenis_dokumen" style="width: 100%;">
									@foreach($jenis_dokumen as $jenis)
										<option value="{{$jenis['id']}}">{{$jenis['nama'].' ('.$jenis['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
                      		<div class="col-sm-10">
                      			<input type="file" id="exampleInputFile">
                      			<p class="help-block">*Dokumen hanya dokumen final Format File PDF</p>
                    		</div>
                    	</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Asal Surat</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tujuan Surat</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="" data-placeholder="Tujuan Surat" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tembusan 1</label>
							<div class="col-sm-9">
                    			<select class="form-control select2" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>											
						<!-- <div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Password">
							</div>
						</div> -->
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