<!-- User Unit Sebelum dan Sesudah Pengadaan -->
<!-- <div class="box @if(count($no_pr) == 1) box-success @else box-default @endif  box-solid collapsed-box">
	<div class="box-header with-border">
		<h3 class="box-title">Dokumen User</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
		</div> /.box-tools -->
	<!-- </div>/.box-header -->
	<!-- <div class="box-body"> -->

		<div class="pull-right">
			<a href="#" class="text-center btn btn-warning btn-xs"><i class="fa fa-plus"></i> Upload</a> 
			<a href="#" class="text-center btn btn-info btn-xs"><i class="fa fa-plus"></i> Verifikasi</a>
		</div>

		<br>
		<br>
		
		@foreach($dokumen_with_pr as $dok_pr)
		@if($dok_pr->no_sap === $pr->pr)
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
					<td>#</td>
					<td class="text-center"><b>No Dokumen</b></td>
					<td class="text-center"><b>Jenis</b></td>
					<!-- <td class="text-center"><b>Nama Dokumen</b></td> -->
				</tr>
				<?php $i=1 ?>
				@foreach($dokumen_with_pr as $dok_pr_cetak)
				<tr>
					<td>{!!$i++!!}</td>
					<td><a href="{{url('dokumen/detail/')}}/{{$dok_pr_cetak->dokumen_id}}">{{$dok_pr_cetak->no_dokumen}} <i class="fa fa-check-circle"></i></a></td>
					<td>{{$dok_pr_cetak->nama_sub}}</td>
					<!-- <td>{{$dok_pr_cetak->nama_dokumen}}</td> -->
				</tr>
				@endforeach
			</tbody>
		</table>
		<br>
		<ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
		@endif
		<?php break; ?>
		@endforeach
<!-- 	</div></div>-->