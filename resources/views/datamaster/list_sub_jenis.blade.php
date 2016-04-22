@extends('./layout')

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Jenis Dokumen</h3>
	</div>
	<div class="box-body">
	    <table class="table table-bordered" id="users-table">
	        <thead>
	            <tr>
	                <th width="10px">#</th>
	                <th>Jenis Dokumen</th>
	                <th>Actifity Dokumen</th>
					<th>Nama Unit</th>
	            </tr>
	        </thead>
			<tbody>
				@foreach ($jenis as $jenis_dok)
					<tr>
						<td>{{$jenis_dok->id}}</td>
						<td><a href="{{url('/dokumen/jenis_dokumen/').'/'.$jenis_dok->id}}">{{$jenis_dok->nama_sub}}</a></td>
						<td>{{$jenis_dok->actifity->nama_actifity}}</td>
						<td>{{$jenis_dok->actifity->unit->nama_unit}}</td>
					</tr>
				@endforeach
			</tbody>
	    </table>

	</div>
	<div class="box-footer">
		<div class="pull-right">
			{!! $jenis->render() !!}
		</div>
	</div><!-- /.box-footer -->
</div>
@stop