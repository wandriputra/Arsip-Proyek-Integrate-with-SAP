@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop

@section('content_main_pages')
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Upload Dokumen Arsip</h3>
            </div>
			<div class="box-body">
				<form class="form-horizontal" method="post" action="{{url('dokumen/upload-dokumen')}}">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Dokumen</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="jenis_dokumen" style="width: 100%;">
									@foreach($jenis_dokumen as $jenis)
										<option value="{{$jenis['id']}}">{{$jenis['nama_jenis']}}</option>
									@endforeach
								</select>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-2 control-label">Sub Jenis</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="sub_jenis_dokumen" style="width: 90%;">
									@foreach($sub_jenis as $sub_jenis)
										<option value="{{$sub_jenis['id']}}">({{$sub_jenis['singkatan']}}) {{$sub_jenis['nama_sub']}}</option>
									@endforeach
								</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Porcuser Requisision</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="pr" style="width: 100%;">
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Porcuser Orser</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="po" style="width: 100%;">
								</select>
							</div>
						</div>												
						<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
                      		<div class="col-sm-10">
                      			<input type="file" id="file_pdf" name="file_pdf">
                      			<p class="help-block">*Dokumen hanya dokumen final Format File PDF</p>
                    		</div>
                    	</div>
                    	<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-2 control-label">No File</label>
                      		<div class="col-sm-5">
                      			<input type="text" id="no_file" class="form-control">
                    		</div>
                    		<div class="col-sm-1">
                    			<i class='fa fa-check bg-green'></i>
                    		</div>
                    	</div>
                    	<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-2 control-label">Nama File</label>
                      		<div class="col-sm-5">
                      			<input type="text" id="nama_file" class="form-control">
                    		</div>
                    		<div class="col-sm-1">
                    			<i class='fa fa-check bg-green'></i>
                    		</div>
                    	</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Asal Surat</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="asal_surat" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama_unit'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tujuan Surat</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="tujuan_surat" data-placeholder="Tujuan Surat" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama_unit'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tembusan 1</label>
							<div class="col-sm-9">
                    			<select class="form-control select2" name="tembusan" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
									@foreach($unit as $unit1)
										<option value="{{$unit1['id']}}">{{$unit1['nama_unit'].' ('.$unit1['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Visibility Dokumen</label>
							<div class="radio">
							@foreach($visibility as $visibility)
								<label>
									<input name="visibility" class="minimal" value="{{$visibility['id']}}" checked="" type="radio">
									{{$visibility['jenis_visibility']}}
								</label>
							@endforeach
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
@stop

@section('costom_js_pages')
<!-- Select2 -->
    <script src="{{ url('asset/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>

	<script>
		$(function () {
			$(".select2").select2();

			$('input[type="radio"].minimal').iCheck({
				radioClass: 'iradio_minimal-blue'
			});

			// $('#file_pdf')change(function(){
			// 	file = $('#file_pdf').val();
			// 	$('#nama_file').val(file);
			// })
		});
    </script>
@stop