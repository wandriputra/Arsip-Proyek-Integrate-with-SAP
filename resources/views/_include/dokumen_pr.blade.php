<!-- User Unit Sebelum dan Sesudah Pengadaan -->
<div class="box @if(count($no_pr) == 1) box-success @else box-default @endif  box-solid collapsed-box">
	<div class="box-header with-border">
		<h3 class="box-title">Dokumen User</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
		</div><!-- /.box-tools -->
	</div><!-- /.box-header -->
	<div class="box-body">
		@if(count($dokumen_with_pr)<=0)
		<a href="#" class="text-center btn btn-warning btn-xs">Upload Dokumen</a>
		@endif
		
		@foreach($dokumen_with_pr as $dok_pr)
		@if($dok_pr->no_sap === $pr->pr)
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td class="text-center"><b>Jenis Dokumen</b></td>
					<td class="text-center"><b>Nama Dokumen</b></td>
					<td class="text-center"><b>No Dokumen</b></td>
				</tr>
				@foreach($dokumen_with_pr as $dok_pr_cetak)
				<tr>
					<td>{{$dok_pr_cetak->nama_sub}}</td>
					<td>{{$dok_pr_cetak->nama_dokumen}}</td>
					<td><a href="{{url('dokumen/detail/')}}/{{$dok_pr_cetak->dokumen_id}}">{{$dok_pr_cetak->no_dokumen}}</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
		<?php break; ?>
		@endforeach
	</div>
</div>