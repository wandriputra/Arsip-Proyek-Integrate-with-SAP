@extends('./layout')

@section('costom_style_pages')
    <style>
        .bold-text{
            font-weight: 600;
            margin-left: 10px;
        }
    </style>
@stop


@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Jadwal Retensi Arsip</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th width="10px">#</th>
                    <th class="center">Kode JRA</th>
                    <th class="center">Jenis Arsip</th>
                    <th class="center">Waktu Aktif</th>
                    <th class="center">Waktu Inaktif</th>
                    <th class="center">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($jra as $jra_dok)
                    <tr>
                        <td>{{$jra_dok->id}}</td>
                        <td class="{{$jra_dok->level != '2' ? 'bold-text' : ''}}"><a href="{{url('/dokumen/jra_dokumen/').'/'.$jra_dok->id}}">{{$jra_dok->kode}}</a></td>
                        <td class="{{$jra_dok->level != '2' ? 'bold-text' : ''}}">{{$jra_dok->jenis_arsip}}</td>
                        <td>{{$jra_dok->waktu_aktif}}</td>
                        <td>{{$jra_dok->waktu_inaktif}}</td>
                        <td>{{$jra_dok->keterangan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="box-footer">
            <div class="pull-right">
                {!! $jra->render() !!}
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop