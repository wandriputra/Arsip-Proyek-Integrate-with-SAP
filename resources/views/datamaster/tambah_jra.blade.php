@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
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
                    <div class="col-md-4">
                        <input type="text" name="kode" class="form-control" value="{{{$edit['kode'] or old('kode')}}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Kode Induk</label>
                    <div class="col-md-4">
                        <input type="text" name="kode" class="form-control" value="{{{$edit['kode'] or old('kode')}}}">
                        <a href="{{url('unit/tambah-unit')}}"><i class="fa fa-fw fa-plus"></i></a>
                    </div>
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
    <script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>
    <script>

    </script>
@stop