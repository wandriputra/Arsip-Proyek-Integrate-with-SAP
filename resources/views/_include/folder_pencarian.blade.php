@extends('./layout')

@section('costom_style_pages')
	<style>
		p .folder-name{
			text-align: center;
		}

		a .folder-menu{
			padding: 0px;
		}
		.dropdown-menu{
			right: 0px;
		}
	</style>
@stop

@section('content_main_pages')
<div class="box box-default ">
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> AFIS</a></li>
		<li><a href="#">Pengadaan Radio</a></li>
		<li class="active">Korin Permintaan Pengadaan</li>
	</ol>
	<div class="box-header with-border">
		<h3 class="box-title">{{Auth::user()->personil->unit->nama_unit}}</h3>
		<!-- <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New Folder</button> -->
		<ul class="nav pull-right">
			<li class="dropdown">
			<a aria-expanded="false" class="dropdown-toggle folder-menu" data-toggle="dropdown" href="#" style="padding: 3px 15px; background-color:#00a65a; color:#fff; border-radius:3px"> Menu <i class="fa fa-gear"></i></a>
				<ul class="dropdown-menu" style="left: inherit;">
					<li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#myModal" href="#">Tambah Folder</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Hapus Folder</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Bagikan Folder</a></li>
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Upload Dokumen</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="box-body">
								<div class="col-md-12">

							<!-- User Unit Sebelum dan Sesudah Pengadaan -->
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<a href="#" data-widget="collapse"><h3 class="box-title">Dokumen User</h3></a>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body">

									<h4>KPP User</h4>
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

									<h4>Dokumen Setelah PO</h4>
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
							
							<!-- procurement dokumen -->
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<a href="#" data-widget="collapse"><h3 class="box-title">Procurement</h3></a>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body">

									<h4>Dokumen RFQ</h4>
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

									<h4>Dokumen Annwizing</h4>
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>

							<!-- Logistik & Warehouse -->
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<a href="#" data-widget="collapse"><h3 class="box-title">Logistic & Warehouse</h3></a>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body">

									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>

							<!-- Accounting -->
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<a href="#" data-widget="collapse"><h3 class="box-title">Accounting</h3></a>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body">
									<table class="table table-bordered">
										<tbody>
											
											<tr>
												<td></td>
												<td><a href="{{url('dokumen/detail/')}}"></a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
						</div><!-- /.col -->
	</div>
	<div class="box-footer">
		
	</div>
</div>

	
@stop