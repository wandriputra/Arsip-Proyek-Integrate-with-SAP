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
                        <select name="unit_asal" class="form-control select2" id="asal_surat" style="width: 95%;">
                            @foreach($unit as $asal_surat)
                                @if($asal_surat['id'] != '1')
                                    <option value="{{$asal_surat['id']}}" @if(Auth::user()->personil->unit->id == $asal_surat['id']) {{'selected'}} @endif >({{$asal_surat['singkatan']}}) {{$asal_surat['nama_unit']}}</option>
                                @endif
                            @endforeach
                        </select> <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
                    </div>
                </div>

                <hr>

                <div class="cloneable-div">
                    <div class="form-group actfitiy-div">
                        <label class="col-sm-3 control-label">Activity Dokumen</label>
                        <div class="col-sm-5">
                            <select class="form-control actifity" name="actifity" id="actifity" style="width: 90%;">
                            </select>
                        </div>
                    </div>
                    <div class="form-group clone-jenis-div">
                        <label class="col-sm-4 control-label">Jenis Dokumen</label>
                        <div class="col-sm-7">
                            <select class="form-control select-remote-data" name="sub_jenis_dokumen" id="sub_jenis_dokumen" style="width: 90%;">

                            </select> <a href="{{url('data/insert-sub-jenis')}}"><i class="fa fa-fw fa-plus"></i></a>
                        </div>
                    </div>
                    <hr>
                </div>




                <div class="table-add-activity" id="tambah_activity">
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
        $number = 0;
        $('.kode').change(function(){
            $.get( "{{url('/data/ajax-jra-cek-kode').'?kode='}}"+$('.kode').val(), function( data ) {
                $('.detail-kode').html(data[0].jenis_arsip);
            });
        })

        $('#tambah_activity').click(function(){
            $clone =  $('.cloneable-div:last').clone();
            $clone.find('div.col-sm-5').val('<select class="form-control select2 activity" name="actifity" id="" style="width: 90%;"> </select>');
            $($clone).insertAfter( ".cloneable-div:last" );
            unit_id = $('#asal_surat').val();
            $.getJSON("{{url('dokumen/ajax-actifity')}}"+"/"+unit_id, function(data) {
                var options = '<option value=""></option>';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].nama_actifity + '</option>';
                }

                $('.actifity:last option').remove();
                $('.actifity:last').append(options);
                $(".actifity").select2('destroy');

                $(".actifity:last").select2({
                    placeholder: "Type Something..."
                });
            });
        });



        $("#table-data").on('change', 'select', function(){
            var val = $(this).val();
            $(this).closest('tr').find('input:text').val(val);
        });
    </script>
@stop