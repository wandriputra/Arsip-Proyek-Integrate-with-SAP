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

        $('#asal_surat').change(add_actifity);

        add_actifity();

        function add_actifity()
        {
            unit_id = $('#asal_surat').val();
            $.getJSON("{{url('dokumen/ajax-actifity')}}" + "/" + unit_id, function (data) {
                var options = '<option value=""></option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
                }
                $('#actifity option').remove();
                $('#actifity').append(options);
            });
        }

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

    $('.kode').change(function(){
        $.get( "{{url('/data/ajax-jra-cek-kode').'?kode='}}"+$('.kode').val(), function( data ) {
            $('.detail-kode').html(data[0].jenis_arsip);
        });
    })

    $('#tambah-jenis').click(function(){
        $clone_jenis = $('.jenis-dokumen:last').clone();
        $($clone_jenis).insertAfter('.jenis-dokumen:last');
        $jenis = $('.jenis-dokumen:last');
        $jenis.find('.add-jenis-link').html(' ');

        $jenis.find('div.select-box').html('<select class="form-control select-remote-data" name="jenis_dokumen[]" id="sub_jenis_dokumen" style="width: 95%;"> </select><a href="{{url('data/insert-sub-jenis')}}" class="add-jenis-link"> <i class="fa fa-fw fa-plus"></i> </a>');
        var $select = $('.select-remote-data:last').select2();
        //console.log($select);
        $select.each(function(i,item){
            //console.log(item);
            $(item).select2("destroy");
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
    });



    $("#table-data").on('change', 'select', function(){
        var val = $(this).val();
        $(this).closest('tr').find('input:text').val(val);
    });

    $('.show-modal').click(function(e) {
        var modal = $('#myModal'), modalBody = $('#myModal .modal-body');

        modal.on('show.bs.modal', function () {
            modalBody.load(e.currentTarget.href)
        }).modal();
        e.preventDefault();
    });
</script>