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
					@include($view)
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

			$(".select-remote-data").select2({
				ajax: {
					minimumInputLength: 3,
					url: "{{url('dokumen/ajax-sub-jenis-dokumen/')}}",
					dataType: 'json',
					delay: 100,
					method:'GET',
						data: function (params) {
							return {
								q: params.term,
								act: $('#actifity').val(), 
								page: params.page
							};
						},
					processResults: function (data, page) {
						return {
							results: data,
							//pagination: {
							//	more: data.more
							//}
						};
					},
					cache: true
					}
			});

			$(".select_pr").select2({
				ajax: {
					url: "{{url('sap/ajax-select-sap')}}",
					dataType: 'json',
					delay: 100,
					method:'GET',
						data: function (params) {
							return {
								q: params.term,
								type: 'pr',
								page: params.page
							};
						},
					processResults: function (data, page) {
						return {
							results: data,
							//pagination: {
							//	more: data.more
							//}
						};
					},
					cache: true
					}
			});

			$(".select_po").select2({
				ajax: {
					url: "{{url('sap/ajax-select-sap')}}",
					dataType: 'json',
					delay: 100,
					method:'GET',
						data: function (params) {
							return {
								q: params.term,
								type: 'po',
								page: params.page
							};
						},
					processResults: function (data, page) {
						return {
							results: data,
							//pagination: {
							//	more: data.more
							//}
						};
					},
					cache: true
					}
			});

			$(".select_cd").select2({
				ajax: {
					url: "{{url('sap/ajax-select-sap')}}",
					dataType: 'json',
					delay: 100,
					method:'GET',
						data: function (params) {
							return {
								q: params.term,
								type: 'cd',
								page: params.page
							};
						},
					processResults: function (data, page) {
						return {
							results: data,
							//pagination: {
							//	more: data.more
							//}
						};
					},
					cache: true
					}
			});

			$(".select_gr").select2({
				ajax: {
					url: "{{url('sap/ajax-select-sap')}}",
					dataType: 'json',
					delay: 100,
					method:'GET',
						data: function (params) {
							return {
								q: params.term,
								type: 'gr',
								page: params.page
							};
						},
					processResults: function (data, page) {
						return {
							results: data,
						};
					},
					cache: true
					}
			});			
		@if($view == 'dokumen.upload_admin')

			$('#asal_surat').change(function(){
				unit_id = $('#asal_surat').val();
				$.getJSON("{{url('dokumen/ajax-actifity')}}"+"/"+unit_id, function(data) {
					var options = '<option value=""></option>';
				    for (var i = 0; i < data.length; i++) {
						options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
					}
					$('#actifity option').remove();
					$('#sub_jenis_dokumen option').remove();
					$('#actifity').append(options);
					$('#actifity').select2();
					if (unit_id != 19 && unit_id != 11 && unit_id != 25 && unit_id != 23) {
						$("#pr_select").removeClass('hide');
						$("#po_select").addClass('hide');
						$("#gr_select").addClass('hide');
						$("#cd_select").addClass('hide');
					};

					if(unit_id == 19 || unit_id == 22|| unit_id == 20 ){
						$("#pr_select").addClass('hide');
						$("#gr_select").addClass('hide');
						$("#cd_select").addClass('hide');
						$("#po_select").removeClass('hide');
					};

					if(unit_id == 23){
						$("#pr_select").addClass('hide');
						$("#gr_select").removeClass('hide');
						$("#cd_select").addClass('hide');
						$("#po_select").addClass('hide');
					};

					if(unit_id == 25){
						$("#pr_select").addClass('hide');
						$("#gr_select").addClass('hide');
						$("#cd_select").removeClass('hide');
						$("#po_select").addClass('hide');
					};
				});
			});
		@endif
			$('#actifity').change(function(){
				actifity_id = $('#actifity').val();
				$('#sub_jenis_dokumen option').remove();
				// $.getJSON('{{url("dokumen/ajax-sub-jenis-dokumen")}}'+"/"+actifity_id, function(data) {
				// 	var options = '<option value=""></option>';
				//     for (var i = 0; i < data.length; i++) {
				// 		options += '<option value="' + data[i].id + '">' + data[i].nama_sub + '</option>';
				// 	}
				// 	$('#sub_jenis_dokumen').append(options);
				// 	$('#sub_jenis_dokumen').select2();
				// });
			});


			// $('#file_pdf')change(function(){
			// 	file = $('#file_pdf').val();
			// 	$('#nama_file').val(file);
			// })
		});
    </script>
@stop