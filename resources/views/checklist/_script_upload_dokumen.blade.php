<!-- Select2 -->
<script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>

{{--todo: perbaiki select2 aplikasi yang menghapus ketika ditekan--}}
<script>
	$(function () {
		id = $('.asal_surat').val();

		cek_unit_id(id);

		function cek_unit_id(unit_id) {
			// body...
			if (unit_id != 19 && unit_id != 11 && unit_id != 25 && unit_id != 23) {
				actifity_id = $('.actifity').val(); // jika user dapatkan actifity dan cek actifity sebelum po atau sesudah po
				if(actifity_id == 1){ //dokumen pr
					$("#pr_select").removeClass('hide');
					$("#po_select").addClass('hide');

				}else if (actifity_id == 2){ //dokumen yang ada po nya
					$("#pr_select").addClass('hide');
					$("#po_select").removeClass('hide');
				}
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

		$(".select2").select2({
			placeholder: "Type Something..."
		});

		$(".select_pr").select2({
			placeholder: "Type Something...",
			ajax: {
				url: "{{url('hrga/ajax-select-sap')}}",
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
					};
				},
				cache: true
			}
		});

		$(".select_po").select2({
			placeholder: "Type Something...",
			ajax: {
				url: "{{url('hrga/ajax-select-sap')}}",
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
					};
				},
				cache: true
			}
		});

		$(".select_cd").select2({
			placeholder: "Type Something...",
			ajax: {
				url: "{{url('hrga/ajax-select-sap')}}",
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
					};
				},
				cache: true
			}
		});

		$(".select_gr").select2({
			placeholder: "Type Something...",
			ajax: {
				url: "{{url('hrga/ajax-select-sap')}}",
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







		// $('#file_pdf')change(function(){
		// 	file = $('#file_pdf').val();
		// 	$('#nama_file').val(file);
		// })


		$('.kode').change(function(){
			$.get( "{{url('/data/ajax-jra-cek-kode').'?kode='}}"+$('.kode').val(), function( data ) {
				$('.detail-kode').html(data[0].jenis_arsip);
			});
		})

	});
</script>