@extends('./layout')

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Actifity Dokumen</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th width="10px">#</th>
                    <th>Actifity Dokumen</th>
                    <th>Nama Unit</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($actifity as $actifity_dok)
                    <tr>
                        <td>{{$actifity_dok->id}}</td>
                        <td><a href="{{url('dokumen/actifity/').'/'.$actifity_dok->id}}">{{$actifity_dok->nama_actifity}}</a></td>
                        <td>{{$actifity_dok->unit->nama_unit}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="box-footer">
            <div class="pull-right">
                {!! $actifity->render() !!}
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop