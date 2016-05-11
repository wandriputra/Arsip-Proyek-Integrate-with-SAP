@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
<div class="row">
	<div class="col-md-12">
		<div class="box box-default ">
			<div class="box-header with-border">
	            <h3 class="box-title">Review Upload Data SAP</h3>
            </div>
			<div class="box-body">
				<table class="table table-bordered table-hover" id="arsip" width="100%" style="font-size:12px">
		            <thead>
		                <tr>
		                    <th></th>
		                    <th class="center">wbs_element</th>
		                    <th class="center">purchase_requisition</th>
		                    <th class="center">purchase_order</th>
		                    <th class="center">material_num</th>
		                    <th class="center">short_text</th>
		                    <th class="center">net_price</th>
		                    <th class="center">po_quantity</th>
		                </tr>
		            </thead>
		        </table>
			</div><!-- /.box -->
		</div>
	</div>
</div>
@stop

@section('costom_js_pages')
<!-- Select2 -->
    <script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>
	    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    })</script>

	<script src="{{url('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{url('asset/plugins/datatables/dataTables.bootstrap.js')}}"></script>

	<script>
	// $(function() {
	    var arsiptable = $('#arsip').DataTable({
	        dom: '<<t>p>',
	        processing: true,
	        serverSide: true,
	        ajax: '{!!url("hrga/ajax-file-upload")!!}',
	        columns: [
	         	{ data: 'id', name:'id', className: 'center', orderable:false},
	            { data: 'wbs_element', name: 'wbs_element', orderable:false},
	            { data: 'purchase_requisition', name: 'purchase_requisition', orderable:false},
	            { data: 'purchase_order', name: 'purchase_order', orderable:false},
	            { data: 'material_num', name: 'material_num', orderable:false},
	            { data: 'short_text', name: 'short_text', orderable:false},
	            { data: 'net_price', name: 'net_price', orderable:false},
	            { data: 'po_quantity', name: 'po_quantity', orderable:false},
	        ]
	    });
	</script>
@stop