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
            <h3 class="box-title">List File ZPC</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <td width="10px">#</td>
                    <td class="center">File Name</td>
                    <td class="center">Jumlah Row</td>
                    <td class="center">Created By</td>
                    <td class="center">Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $data_sap)
                    <tr>
                        <td>{{$data_sap->id}}</td>
                        <td>{{$data_sap->file_name}}</td>
                        <td>{{$data_sap->jumlah_row}}</td>
                        <td>{{$data_sap->user_created->personil->nama_personil}}</td>
                        <td>{{$data_sap->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="box-footer">
            <div class="pull-right">
                {!! $data->render() !!}
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop