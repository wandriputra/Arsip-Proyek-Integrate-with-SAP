<!-- User Unit Sebelum dan Sesudah Pengadaan -->
@foreach($no_po as $po)
		<div class="box box-default collapsed-box">

			<div class="box-header with-border" data-widget="collapse">
				<i class="fa fa-plus"></i>
				<h3 class="box-title">Dokumen User PO : {{$dokumen->dokumen_sap->no_sap}}</h3>
			</div>

			<div class="box-body">
				{{--<div class="pull-right">--}}
				{{--<a href="#" class="text-center btn btn-warning btn-xs"><i class="fa fa-plus"></i> Upload</a> --}}
				{{--<a href="#" class="text-center btn btn-info btn-xs"><i class="fa fa-plus"></i> Verifikasi</a>--}}
				{{--</div>--}}

				{{--<br>--}}
				{{--<br>--}}

				<table class="table table-striped table-bordered">
					<tbody>
					<tr>
						<td>#</td>
						<td class="text-center"><b>No Dokumen</b></td>
						<td class="text-center"><b>Jenis</b></td>
						<!-- <td class="text-center"><b>Nama Dokumen</b></td> -->
					</tr>

					<?php $i=1; ?>
					@foreach($dokumen_with_po as $dok_po_cetak)
						@if($dok_po_cetak->actifity_id == 2 && $dok_po_cetak->po == $po->po)
							<tr>
								<td>{!!$i++!!}</td>
								<td><a href="{{url('dokumen/detail/')}}/{{$dok_po_cetak->dokumen_id}}">{{$dok_po_cetak->no_dokumen}}
										@if($dok_po_cetak->status_dokumen_id === 1)<i class="fa fa-check-circle"></i>@endif</a></td>
								<td>{{$dok_po_cetak->nama_sub}}</td>
								<!-- <td><i class="fa fa-minus-circle"></i></a></td> -->
								<!-- <td>{{$dok_po_cetak->nama_dokumen}}</td> -->
							</tr>
						@endif
					@endforeach

					</tbody>
				</table>
			</div>
		</div>
@endforeach

