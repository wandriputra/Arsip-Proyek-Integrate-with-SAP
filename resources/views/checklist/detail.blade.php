@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
    <style>
        td, th {
            padding: 10px;
            border: 1px solid #f4f4f4;

        }
        .table-chacklist{
            width:100%;
        }
        .judul-checklist{
            padding:5px;
        }
    </style>
@stop

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Checklist</h3>
        </div>
        <div class="box-body">
            <a href="{{url('checklist/print')}}" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <h4 class="text-center judul-checklist">CHECK LIST VERIFIKASI ARSIP PROYEK INDARUNG VI<br>{{$data['nama_checklist']}}</h4>
            <div class="col-md-offset-8 col-md-4">
                <table class="table table-border">
                    <tr>
                        <td>No PR</td>
                        <td>________________________</td>
                    </tr>
                    <tr>
                        <td>No P0</td>
                        <td>________________________</td>
                    </tr>
                    <tr>
                        <td>No CD</td>
                        <td>________________________</td>
                    </tr>
                </table>
            </div>
            <table class="table-chacklist" border="1">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Aktifitas</th>
                    <th class="text-center">Jenis Dokumen</th>
                    <th class="text-center">Dokumen</th>
                </tr>
                <?php $i=1; $j=1;?>
                @foreach($list as $val)
                    <tr>
                        @if($j > $act[$val['actifity']['nama_actifity']]['rowspan'])
                            <?php $j=1; ?>
                        @endif

                        @if($j==1)
                            <td rowspan="{{$act[$val['actifity']['nama_actifity']]['rowspan']}}">{{$i++}}</td>
                            <td rowspan="{{$act[$val['actifity']['nama_actifity']]['rowspan']}}">{{$val['actifity']['nama_actifity']}}</td>
                        @endif
                            <?php $j++ ?>
                        <td>{{$val['sub_jenis_dok']['nama_sub']}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">
            <div class="pull-right">
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop

@section('costom_js_pages')

@stop