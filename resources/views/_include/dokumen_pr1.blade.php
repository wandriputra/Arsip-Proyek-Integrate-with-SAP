<!-- User Unit Sebelum dan Sesudah Pengadaan -->
<div class="box @if(count($no_pr) == 1) box-success @else box-default @endif  box-solid collapsed-box">
	<div class="box-header with-border" data-widget="collapse">
		<i class="fa fa-plus"></i>
		<h3 class="box-title">Dokumen User</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td></td>
					<td class="text-center"><b>Jenis Dokumen</b></td>
					<td class="text-center"><b>Nama Dokumen</b></td>
					<td class="text-center"><b>No Dokumen</b></td>
				</tr>
				<?php $i=1 ?>
				@foreach($dokumen_with_pr as $dok_pr_cetak)
				<tr>
					<td class="text-center">{{$i++}}</td>
					<td>{{$dok_pr_cetak->nama_sub}}</td>
					<td>{{$dok_pr_cetak->nama_dokumen}}</td>
					<td><a href="{{url('dokumen/detail/')}}/{{$dok_pr_cetak->dokumen_id}}">{{$dok_pr_cetak->no_dokumen}}</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			
		</div>
	</div>
</div>