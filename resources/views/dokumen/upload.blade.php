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
				<form class="form-horizontal" method="post" action="{{url('dokumen/upload')}}" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Asal Surat</label>
							<div class="col-md-8">
								<select name="unit_asal" class="form-control select2" id="asal_surat" style="width: 90%;">
									@foreach($unit as $asal_surat)
										@if($asal_surat['id'] != '1')
										<option value="{{$asal_surat['id']}}" @if(Auth::user()->personil->unit->id == $asal_surat['id']) {{'selected'}} @endif >({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
										@endif
									@endforeach
								</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Actifity</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="actifity" id="actifity" style="width: 90%;">
									@foreach($actifity as $actifity)
										<option value="{{$actifity['id']}}">{{$actifity['nama_actifity']}}</option>
									@endforeach
								</select> <a href="{{url('data/tambah-actifity')}}"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-3 control-label">Sub Jenis Dokumen</label>
							<div class="col-sm-7">
								<select class="form-control select2" name="sub_jenis_dokumen" id="sub_jenis_dokumen" style="width: 90%;">
									@foreach($sub_jenis as $sub_jenis)
										<option value="{{$sub_jenis['id']}}">({{$sub_jenis['singkatan']}}) {{$sub_jenis['nama_sub']}}</option>
									@endforeach
								</select> <a href="{{url('data/insert-sub-jenis')}}"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">No PR</label>
							<div class="col-sm-3">
								<!-- <input class="form-control" name="pr"> -->
								<select class="form-control select2" name="pr">
								<option value="" selected></option>
								@foreach($pr as $pr)
									<option value="{{$pr}}">{{$pr}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">No PO</label>
							<div class="col-sm-3">
								<!-- <input class="form-control select2" name="po"> -->
								<select class="form-control select2" name="po">
									<option value="" selected></option>
									@foreach($po as $po)
										<option value="{{$po}}">{{$po}}</option>
									@endforeach
								</select>
							</div>
						</div>												
						<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-3 control-label">File input</label>
                      		<div class="col-sm-9">
                      			<input type="file" id="file_pdf" name="file_pdf">
                      			<p class="help-block">*Dokumen hanya dokumen final Format File PDF</p>
                    		</div>
                    	</div>
                    	<!-- <div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-3 control-label">No File</label>
                      		<div class="col-sm-5">
                      			<input type="text" id="no_file" class="form-control">
                    		</div>
                    		<div class="col-sm-1">
                    			<i class='fa fa-check bg-green'></i>
                    		</div>
                    	</div>
                    	<div class="form-group">
                      		<label for="exampleInputFile" class="col-sm-3 control-label">Nama File</label>
                      		<div class="col-sm-5">
                      			<input type="text" id="nama_file" class="form-control">
                    		</div>
                    		<div class="col-sm-1">
                    			<i class='fa fa-check bg-green'></i>
                    		</div>
                    	</div> -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tujuan Surat</label>
							<div class="col-md-6">
								<select name="unit_tujuan" class="form-control select2" id="" style="width: 90%;">
									<option value="" selected></option>
									@foreach($unit as $tujuan_surat)
										@if($tujuan_surat['id'] != '1')
											<option value="{{$tujuan_surat['id']}}">({{$tujuan_surat['singkatan']}}) {{$tujuan_surat['nama_unit']}}</option>
										@endif
									@endforeach
								</select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tembusan</label>
							<div class="col-sm-9">
                    			<select class="form-control select2" name="tembusan" multiple="multiple" data-placeholder="Tembusan Surat" style="width: 100%;">
									@foreach($unit as $tembusan)
										<option value="{{$tembusan['id']}}">{{$tembusan['nama_unit'].' ('.$tembusan['singkatan'].')'}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Visibility Dokumen</label>
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

			// var json = (function () {
			// var json = null;
			// $.ajax({
			// 'async': false,
			// 'global': false,
			// 'url': 'http://papi.semenpadang.co.id/frontend/web/index.php?r=arsip/pr',
			// 'dataType': "json",
			// 'success': function (data) {
			// json = data;
			// }
			// });
			// return json;
			// })();

			// $('.pr').select2({ 150.30:80
			// 	ajax: {
			// 		url: "{{url('papi/ajax-pr')}}",
			// 		dataType: 'json',
			// 		results: function (data) {
			//             return {results: data};
			//         }
			// 	}
			// });

			$('#asal_surat').change(function(){
				unit_id = $('#asal_surat').val();
				$('#actifity option').remove();
				$.getJSON("{{url('data/ajax-actifity')}}"+"/"+unit_id, function(data) {
					var options = '<option value="" selected>.....</option>';
				    for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
					}
					$('#actifity').append(options);
					$('#actifity').select2();
				});
			});

			$('#actifity').change(function(){
				actifity_id = $('#actifity').val();
				$('#sub_jenis_dokumen option').remove();
				$.getJSON('{{url("data/ajax-sub-jenis-dokumen")}}'+"/"+actifity_id, function(data) {
					var options = '<option value="" selected>.....</option>';
				    for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].id + '">' + data[i].nama_sub + '</option>';
					}
					$('#sub_jenis_dokumen').append(options);
					$('#sub_jenis_dokumen').select2();
				});
			});


			function updateMenu(menu, id) {
				// body...
				console.log('sukses!');
				$('#'+menu+' option').remove();
				if (menu == 'actifity') {
					url = "{{url('data/ajax-actifity')}}";
				} else if (menu == 'sub_jenis_dokumen'){
					url = "{{url('data/ajax-sub-jenisdokumen')}}";
				};
				$.getJSON(url+"/"+id, function(data) {
					var options = '<option value="" selected>.....</option>';
				    for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
					}
					$('#'+menu).append(options);
					$("#"+menu).select2();
				});
			}

			// $('#file_pdf')change(function(){
			// 	file = $('#file_pdf').val();
			// 	$('#nama_file').val(file);
			// })
		});
    </script>
@stop