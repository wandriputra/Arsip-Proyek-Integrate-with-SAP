	@foreach($unit_po as $unit)
	<div class="box box-default box-solid collapsed-box">
		<div class="box-header with-border" data-widget="collapse">
			<i class="fa fa-plus"></i>
			<h3 class="box-title">Dokumen {{$unit->nama_unit}}</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		<a href="#" class="text-center btn btn-warning btn-xs">Upload Dokumen</a>
		
		@foreach($actifity_all as $actifity)
			@if($actifity->unit_id == $unit->id)
				@foreach($dokumen_with_po as $dok_po)
					@if($actifity->id == $dok_po->actifity_id && $dok_po->purchase_order === $po->po)
					<div class="box box-default collapsed-box">
						<div class="box-header with-border" data-widget="collapse">
							<i class="fa fa-plus"></i>
							<h4 class="box-title">{{$actifity->nama_actifity}}</h4>
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
									@if($actifity->id == $dok_po_cetak->actifity_id )
									<tr>
										<td>{{$dok_po_cetak->nama_sub}}</td>
										<td>{{$dok_po_cetak->nama_dokumen}}</td>
										<td><a href="{{url('dokumen/detail/')}}/{{$dok_po_cetak->dokumen_id}}">{{$dok_po_cetak->no_dokumen}}</a></td>
									</tr>
									@endif
								@endforeach
								</tbody>
							</table>
							<ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=2">2</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=3">3</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=4">4</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=5">5</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=6">6</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=7">7</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=53">53</a></li><li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=54">54</a></li> <li><a href="http://localhost/arsip_indarung6/pencarian?q=a&amp;page=2" rel="next">»</a></li></ul>
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
