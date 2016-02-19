@extends('./layout')

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