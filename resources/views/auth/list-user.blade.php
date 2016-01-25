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
	                <th>Username</th>
	                <th>Nama Personil</th>
	                <th>Email</th>
	                <th>Created by</th>
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
         	"ordering": true,
        	"info": true,
         	"autoWidth": false,
	        processing: true,
	        serverSide: true,
	        orderable:false,
	        ajax: '{{url('auth/ajax-list-user')}}',
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'username', name: 'username' },
	            { data: 'nama_personil', name: 'nama_personil' },
	            { data: 'email', name: 'email' },
	            { data: 'created_by', name: 'created_by' },
	            { data: 'action', name: 'action' }
	        ]
	    });
	</script>
@stop