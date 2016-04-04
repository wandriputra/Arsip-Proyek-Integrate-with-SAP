<!-- Select2 -->
    <script src="{{ url('asset/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>


	<script>
		$(function () {
			$(".select2").select2({
				placeholder: "Type Something..."
			});

			$('input[type="radio"].minimal').iCheck({
				radioClass: 'iradio_minimal-blue'
			});

			$(".select-remote-data").select2({
				placeholder: "Type Something...",
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
				placeholder: "Type Something...",
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
				placeholder: "Type Something...",
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
				placeholder: "Type Something...",
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
				placeholder: "Type Something...",
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

		unit_id = $('#asal_surat').val();
		$.getJSON("{{url('dokumen/ajax-actifity')}}"+"/"+unit_id, function(data) {
			var options = '<option value=""></option>';
		    for (var i = 0; i < data.length; i++) {
				options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
			}
			$('#actifity option').remove();
			$('#sub_jenis_dokumen option').remove();
			$('#actifity').append(options);
			$('#actifity').select2({
				placeholder: "Type Something..."
			});
		});
		cek_unit_id(unit_id);



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
					$('#actifity').select2({
						placeholder: "Type Something..."
					});
					cek_unit_id(unit_id);
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

			function cek_unit_id(unit_id) {
				// body...
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
			}


			// $('#file_pdf')change(function(){
			// 	file = $('#file_pdf').val();
			// 	$('#nama_file').val(file);
			// })
		});
    </script>