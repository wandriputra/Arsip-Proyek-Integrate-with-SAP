@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">List Jabatan</h3>
	</div>
	<div class="box-body">
	    <table class="table table-bordered" id="users-table">
	        <thead>
	            <tr>
	                <th width="10px">ID</th>
	                <th>Jenis Dokumen</th>
	                <th>Sub Jenis Dokumen</th>
	                <th>Level Sub Jenis</th>
	            </tr>
	        </thead>
	    </table>
	</div>
	<div class="box-footer">
		<div class="">
		</div>
	</div><!-- /.box-footer -->
</div>
@stop

@section('costom_js_pages')
	<script src="{{ url('/asset/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{ url('/asset/plugins/datatables/dataTables.bootstrap.js')}}"></script>
	<script>
	    $('#users-table').dataTable({
	    	"paging": true,
          	"lengthChange": false,
         	"ordering": false,
        	"info": true,
         	"autoWidth": false,
	        processing: true,
	        serverSide: true,
	        orderable:false,
	        ajax: '{{url('data/ajax-list-sub-jenis')}}',
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'jenis_dokumen', name: 'jenis_dokumen' },
	            { data: 'nama_sub', name: 'nama_sub' },
	            { data: 'level_dokumen', name: 'level_dokumen' },

	        ]
	    });
	</script>
@stop