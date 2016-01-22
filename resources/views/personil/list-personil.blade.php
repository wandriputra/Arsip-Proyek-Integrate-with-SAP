@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">List User</h3>
	</div>
	<div class="box-body">
	    <table class="table table-bordered" id="users-table">
	        <thead>
	            <tr>
	                <th width="10px">ID</th>
	                <th>Nik</th>
	                <th>Nama Personil</th>
	                <th>Email</th>
	                <th>Unit</th>
	                <th>Jabatan</th>
	                <th>Atasan</th>
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
        	"searching": false,
         	"ordering": true,
        	"info": true,
         	"autoWidth": false,
	        processing: true,
	        serverSide: true,
	        orderable:false,
	        ajax: '{{url('personil/ajax-list-personil')}}',
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'nik', name: 'nik' },
	            { data: 'nama_personil_singkatan', name: 'nama_personil_singkatan' },
	            { data: 'email', name: 'email' },
	            { data: 'unit', name: 'unit' },
	            { data: 'jabatan', name: 'jabatan' },
	            { data: 'atasan', name: 'atasan' },
	            { data: 'action', name: 'action' }
	        ]
	    });
	</script>
@stop