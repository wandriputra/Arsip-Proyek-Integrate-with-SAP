
	@foreach($unit_po as $unit)
	<div class="box box-default box-solid collapsed-box">
		<div class="box-header with-border">
			<a href="#" data-widget="collapse"><h3 class="box-title">Dokumen {{$unit->nama_unit}}</h3></a>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
		@foreach($actifity_all as $actifity)
			@if($actifity->unit_id == $unit->id)
				@foreach($dokumen_with_po as $dok_po)
					@if($actifity->id == $dok_po->actifity_id)
					<div class="box box-default collapsed-box">
						<div class="box-header with-border">
							<h4 class="box-title">{{$actifity->nama_actifity}}</h4>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tbody>
								<tr>
									<td class="text-center"><b>Jenis Dokumen</b></td>
									<td class="text-center"><b>Nama Dokumen</b></td>
									<td class="text-center"><b>No Dokumen</b></td>
								</tr>
								@foreach($dokumen_with_po as $dok_po_cetak)
									@if($actifity->id == $dok_po_cetak->actifity_id && $dok_po_cetak->purchase_order === $po->po)
									<tr>
										<td>{{$dok_po_cetak->nama_sub}}</td>
										<td>{{$dok_po_cetak->nama_dokumen}}</td>
										<td><a href="{{url('dokumen/detail/')}}/{{$dok_po_cetak->dokumen_id}}">{{$dok_po_cetak->no_dokumen}}</a></td>
									</tr>
									@endif
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
						<?php break; ?>
					@endif

				@endforeach
			@endif
		@endforeach
		</div>
	</div>
	@endforeach
