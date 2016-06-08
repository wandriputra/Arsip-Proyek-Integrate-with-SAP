@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
    <style>
        td, th {
            padding: 10px;
            border: 1px solid #f4f4f4;

        }
        .table-checklist{
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
                     {{--TODO: print semua no sap yang ada / terkait pada dokumen--}}
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
            @include('checklist._table_detail')
        </div>
        <div class="box-footer">
            <div class="pull-right">
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop

@section('costom_js_pages')

@stop