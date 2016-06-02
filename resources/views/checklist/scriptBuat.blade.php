<!-- Select2 -->
<script src="{{ url('asset/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>

{{--todo: perbaiki select2 aplikasi yang menghapus ketika ditekan--}}
<script>
    $(function () {
        $(".select2").select2({
            placeholder: "Type Something..."
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
                    };
                },
                cache: true
            }
        });


         $('#asal_surat').change(function(){
             unit_id = $('#asal_surat').val();
             $.getJSON("{{url('dokumen/ajax-actifity')}}"+"/"+unit_id, function(data) {
                 var options = '<option value=""></option>';
                 for (var i = 0; i < data.length; i++) {
                     options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
                 }
                 $('#actifity option').remove();
                 $('#actifity').append(options);
             });
        });

        $('#actifity').change(function(){

        });


        // $('#file_pdf')change(function(){
        // 	file = $('#file_pdf').val();
        // 	$('#nama_file').val(file);
        // })
    });

    $('.kode').change(function(){
        $.get( "{{url('/data/ajax-jra-cek-kode').'?kode='}}"+$('.kode').val(), function( data ) {
            $('.detail-kode').html(data[0].jenis_arsip);
        });
    })
</script>