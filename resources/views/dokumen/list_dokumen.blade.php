@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
<div class="row">
	<div class="col-md-12">
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Uploaded Dokumen</h3>
	            <div class="pull-right"><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload File</a></div>
            </div>
			<div class="box-body">
				<table class="table table-bordered table-hover" id="arsip" width="100%" style="font-size:12px">
		            <thead>
		                <tr>
		                    <th></th>
		                    <th class="text-center">Nama Dokumen</th>
		                    <th class="text-center">Actifity</th>
		                    <th class="text-center">No SAP</th>
		                    <th class="text-center">Action</th>
		                </tr>
		            </thead>
		        </table>
			</div><!-- /.box -->
		</div>
	</div>
</div>
@stop

@section('costom_js_pages')

	<script src="{{url('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{url('asset/plugins/datatables/dataTables.bootstrap.js')}}"></script>

	<script>
	// $(function() {
	    var arsiptable = $('#arsip').DataTable({
	        dom: '<<t>p>',
	        processing: true,
	        serverSide: true,
	        @if($file_unit)
	        ajax: '{!!url("dokumen/ajax-list-dokumen/file")!!}',
	        @else
	        ajax: '{!!url("dokumen/ajax-list-dokumen")!!}',
	        @endif
	        columns: [
	         	{ data: 'id', name:'id', orderable:false},
	         	{ data: 'link_to_file', name:'link_to_file', orderable:false},
	         	{ data: 'actifity', name:'actifity', orderable:false},
	         	{ data: 'no_sap', name:'no_sap', orderable:false},
	         	{ data: 'action', name:'action', orderable:false},
	        ]
	    });
	</script>
@stop