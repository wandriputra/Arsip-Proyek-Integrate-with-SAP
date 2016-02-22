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
								<td>{{$dokumen['no_dokumen']}}</td>
							</tr>
							<tr>
								<td>Nomor Dokumen</td>
								<td>{{$dokumen['nama_dokumen'] or 'kosong'}}</td>
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
								<td>Nomer {{$dokumen->dokumen_sap->type}}</td>
								<td><a href="@if($dokumen->dokumen_sap->no_sap) {{url('dokumen/no_sap')}}/{{$dokumen->dokumen_sap->type}}/{{$dokumen->dokumen_sap->no_sap}} @else {{url('dokumen/edit/')}}/{{$dokumen['id']}} @endif ">{{$dokumen->dokumen_sap->no_sap or 'Belum ada PR' }}</a></td>
							</tr>
							<tr>
								<td>Tembsuan</td>
								<td>
								@foreach($dokumen->dokumen_tembusan as $tembusan)
									<a href="">{{$tembusan->nama_unit}} </a><br>
								@endforeach
								</td>
							</tr>
							<tr>
								<td>Status</td>
								<td><span class="btn-success btn-xs">Verifed</span></td>
							</tr>
							<tr>
								<td>Lokator</td>
								<td>{{$dokumen->locator}}</td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="dokumen_terkait">
					<div class="row">
					
						<div class="col-md-12">
						
							@if(count($no_pr) == 1)
								@include('_include.dokumen_pr')
							@else
								@foreach($no_pr as $pr)
								<div class="box box-success box-solid collapsed-box">
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
							<div class="box box-success box-solid collapsed-box">
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
				</div>
			</div>
		</div>
@stop