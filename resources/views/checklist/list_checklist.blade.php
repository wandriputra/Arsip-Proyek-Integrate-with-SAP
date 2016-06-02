@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">List Checklist</h3>
        </div>
        <div class="box-body">
            <a href="{{url('checklist/buat')}}" class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> Buat Checklist</a>
            <table class="table table-bordered" id="checklist-table">
                <thead>
                <tr>
                    <th width="10px">#</th>
                    <th>Checklist</th>
                    <th>Nama Unit</th>
                    <th>Detail</th>
                </tr>
                </thead>

            </table>

        </div>
        <div class="box-footer">
            <div class="pull-right">
            </div>
        </div><!-- /.box-footer -->
    </div>
@stop

@section('costom_js_pages')
    <script src="{{ url('/asset/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ url('/asset/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script>
        $('#checklist-table').dataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            orderable:false,
            ajax: '{{url('checklist/ajax-list-checklist')}}',
            columns: [
                { data: 'id', name: 'id', orderable:false },
                { data: 'nama_checklist', name: 'nama_checklist', orderable:false },
                { data: 'nama_unit', name: 'nama_unit', orderable:false },
                { data: 'detail', name: 'detail', orderable:false }

            ]
        });
    </script>
@stop