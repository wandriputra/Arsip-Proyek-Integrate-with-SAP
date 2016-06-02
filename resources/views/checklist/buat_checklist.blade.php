@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <style>
        .detail-kode{
            margin-top: 10px;
            font-style: italic;
            font-weight: 400;
        }
        .table-add-activity{
            text-align: center;
            width: 100%;
            padding: 10px;
            border-radius: 3px;
        }
        .table-add-activity:hover{
            background-color: #eee;
        }
    </style>
@stop

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Checklist Baru</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-horizontal" action="{{url('checklist/buat')}}">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nama Checklist</label>
                    <div class="col-md-8">
                        <input type="text" name="nama_checklist" class="form-control kode" value="{{{old('nama_checklist')}}}">
                    </div>
                    <label class="detail-kode"> </label>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Unit</label>
                    <div class="col-md-8">
                        <select name="unit_id" class="form-control select2" id="asal_surat" style="width: 95%;">
                            @foreach($unit as $asal_surat)
                                @if($asal_surat['id'] != '1')
                                    <option value="{{$asal_surat['id']}}" @if(Auth::user()->personil->unit->id == $asal_surat['id']) {{'selected'}} @endif >({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
                                @endif
                            @endforeach
                        </select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Actifity</label>
                    <div class="col-sm-8">
                        <select class="form-control select2" name="actifity" id="actifity" style="width: 95%;">
                        </select>
                    </div>
                </div>

                <div class="form-group jenis-dokumen">
                    <label class="col-sm-3 control-label">Jenis Dokumen</label>
                    <div class="col-sm-7 select-box">
                        <select class="form-control select-remote-data" name="jenis_dokumen[]" id="sub_jenis_dokumen" style="width: 95%;">
                        </select>
                            <a href="{{url('data/insert-sub-jenis')}}" class="add-jenis-link">
                                <i class="fa fa-fw fa-plus"></i>
                            </a>
                    </div>
                </div>

                <div class="table-add-activity" id="tambah-jenis">
                    <i class="fa fa-fw fa-plus"></i> Tambah Activity
                </div>


        </div>
        <div class="box-footer">
            <div class="">
                <button type="reset" class="btn btn-default col-md-2">Reset</button>
                <button type="submit" class="btn btn-info col-md-2 pull-right">Tambah</button>
            </div>
        </div><!-- /.box-footer -->
        </form>
    </div>
@stop

@section('costom_js_pages')
    @include('checklist.scriptBuat')
    <script>
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
    </script>
@stop