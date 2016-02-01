@extends('./layout')

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
		<div class="nav-tabs-custom">            
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> {{$dokumen->asal_surat->nama_unit}}</a></li>
				<li><a href="#"></a></li>
				<li class="active">{{$dokumen['nama_dokumen']}}</li>
			</ol>
            <ul class="nav nav-tabs">
				<li class="active"><a href="#file_pdf" data-toggle="tab">File PDF</a></li>
				<li><a href="#detail_file" data-toggle="tab">Detail</a></li>
				<li><a href="#dokumen_terkait" data-toggle="tab">Dokumen Terkait</a></li>
            </ul>
            <div class="tab-content">

				<div class="active tab-pane" id="file_pdf">
					<object data="{{url('/dokumen/file')}}/{{$dokumen['id']}}" type="application/pdf" width="100%" height="600">
						<p>Pastikan anda telah melakukan update browser ke versi terbaru untuk menikmati fitur <b>Aplikasi Arsip Indarung VI</b> secara penuh. Dan jika masih belum bisa membuka file ini lewat browser maka matikan Aplikasi Download yang ada pada Komputer / Laptop. File : <a href="{{url('/dokumen/file')}}/{{$dokumen['id']}}">{{$dokumen['nama_dokumen']}}</a></p>
					</object>
				</div>

				<div class="tab-pane" id="detail_file">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>ID Dokumen</td>
								<td>{{$dokumen['id']}}</td>
							</tr>
							<tr>
								<td>Sub Jenis Dokumen</td>
								<td>{{$dokumen->sub_jenis_dokumen->actifity->nama_actifity}}</td>
							</tr>
							<tr>
								<td>Jenis Dokumen</td>
								<td>{{$dokumen->sub_jenis_dokumen->singkatan}} / {{$dokumen->sub_jenis_dokumen->nama_sub}} ({{$dokumen->sub_jenis_dokumen->singkatan}})</td>
							</tr>
							<tr>
								<td>Nama Pengadaan</td>
								<td></td>
							</tr>
							<tr>
								<td>Nama Dokumen</td>
								<td>{{$dokumen['nama_dokumen'] or 'kosong'}}</td>
							</tr>
							<tr>
								<td>Nomor Dokumen</td>
								<td>{{$dokumen['no_dokumen']}}</td>
							</tr>
							<tr>
								<td>Asal Dokumen</td>
								<td><a href="">{{$dokumen->asal_surat->nama_unit}}</a></td>
							</tr>
							<tr>
								<td>Tujuan Dokumen</td>
								<td><a href="">{{$dokumen->tujuan_surat->nama_unit or '-'}}</a></td>
							</tr>
							<tr>
								<td>Nomer PR</td>
								<td><a href="">{{$dokumen->dokumen_pr->pr or 'Belum ada PR' }}</a></td>
							</tr>
							<tr>
								<td>Nomer PO</td>
								<td><a href="">{{$dokumen->dokumen_po->po or 'Belum ada PO' }}</a></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><span class="btn-success btn-xs">Verifed</span></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="dokumen_terkait">
					<div class="row">
					
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

					</div><!-- /.row -->
				</div>
			</div>
		</div>
@stop