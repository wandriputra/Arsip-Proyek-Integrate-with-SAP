@foreach($unit_po as $unit)
	@foreach($dokumen_with_po as $dok_po)
		@if($dok_po->unit_asal == $unit->id && $dok_po->po == $po->po)
	<div class="box box-default box-solid  collapsed-box ">
		<div class="box-header with-border" data-widget="collapse">
			<i class="fa fa-minus"></i>
			<h3 class="box-title">Dokumen {{$unit->nama_unit}}</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			{{--<div class="pull-right">--}}
				{{--<a href='{{url("dokumen/upload?po=$po->po&amp;unit=$unit->id")}}' class="text-center btn btn-warning btn-xs"><i class="fa fa-plus"></i> Upload</a>--}}
				{{--<a href="#" class="text-center btn btn-info btn-xs"><i class="fa fa-plus"></i> Verifikasi</a>--}}
			{{--</div>--}}

			{{--<br>--}}
			{{--<br>--}}

			@foreach($actifity_all as $actifity)
				@if($actifity->unit_id == $unit->id)
					@foreach($dokumen_with_po as $dok_po)
						@if($actifity->id == $dok_po->actifity_id && $dok_po->purchase_order === $po->po)
							<div class="box box-info collapsed-box">
								<div class="box-header with-border" data-widget="collapse">
									<i class="fa fa-plus"></i>
									<h4 class="box-title">Actifity: {{$actifity->nama_actifity}}</h4>
								</div><!-- /.box-header -->
								<div class="box-body">
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
											@if($actifity->id == $dok_po_cetak->actifity_id )
												<tr>
													<td>{!!$i++!!}</td>
													<td><a href="{{url('dokumen/detail/')}}/{{$dok_po_cetak->dokumen_id}}/{{$dok_po_cetak->no_sap}}">{{$dok_po_cetak->no_dokumen}}
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
							<?php break; ?>
						@endif

					@endforeach
				@endif
			@endforeach
		</div>
	</div>
		@endif
		<?php break; ?>
	@endforeach
@endforeach