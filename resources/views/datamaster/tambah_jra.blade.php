@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <style>
        .detail-kode{
            margin-top: 10px;
            font-style: italic;
            font-weight: 400;
        }
    </style>
@stop

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Jadwal Retensi Arsip</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('data/tambah-jra')}}}">
                {{csrf_field()}}

                <input type="hidden" name="prev_url" value="{{URL::previous()}}">

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Kode Klasisfikasi JRA</label>
                    <div class="col-md-2">
                        <input type="text" name="kode" class="form-control kode" value="{{{$edit['kode'] or old('kode')}}}">
                    </div>
                    <label class="detail-kode"> </label>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Jenis Arsip</label>
                    <div class="col-md-8">
                        <input type="text" name="jenis_arsip" class="form-control" value="{{{$edit['jenis_arsip'] or old('jenis_arsip')}}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Waktu Simpan Aktif</label>
                    <div class="col-md-2">
                        <input type="text" name="waktu_aktif" class="form-control" value="{{{$edit['waktu_aktif'] or old('waktu_aktif')}}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Waktu Simpan Inaktif</label>
                    <div class="col-md-2">
                        <input type="text" name="waktu_inaktif" class="form-control" value="{{{$edit['waktu_inaktif'] or old('waktu_inaktif')}}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-md-8">
                        <input type="text" name="keterangan" class="form-control" value="{{{$edit['keterangan'] or old('keterangan')}}}">
                    </div>
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
    <script>
        $('.kode').change(function(){
            $.get( "{{url('/data/ajax-jra-cek-kode').'?kode='}}"+$('.kode').val(), function( data ) {
                $('.detail-kode').html(data[0].jenis_arsip);
            });
        })
    </script>
@stop