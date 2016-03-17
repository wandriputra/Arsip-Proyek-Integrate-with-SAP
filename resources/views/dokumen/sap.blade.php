@extends('./layout')

@section('costom_style_pages')
<style type="text/css">

	a.nama-dokumen {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: N; /* number of lines to show */
		line-height: X;        /* fallback */
		max-height: X*N;       /* fallback */
	}
</style>
@stop

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
		<div class="box box-default">            
			<ol class="breadcrumb">
				<li><b><i>Hasil Pencarian</i></b></li>
			</ol>
			<div class="box-body">	
					<div class="row">
					
						<div class="col-md-12">
							@if(count($no_pr) == 1)
								@include('_include.dokumen_pr')
							@else
								@foreach($no_pr as $pr)
								<div class="box box-success box-solid">
									<div class="box-header with-border">
										<h3 class="box-title">Dokumen PR : {{$pr->pr}}</h3>
										<div class="box-tools pull-right">
											<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
										</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										@include('_include.dokumen_pr')
									</div>
								</div>
								@endforeach
							@endif
							
							@foreach($no_po as $po)
							<div class="box box-success box-solid">
								<div class="box-header with-border">
									<h3 class="box-title">Dokumen PO : {{$po->po}}</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body">
									@include('_include.dokumen_po')
								</div>
							</div>
							@endforeach
							
						</div><!-- /.col -->
					</div><!-- /.row -->
			</div></div>
		</div>
@stop