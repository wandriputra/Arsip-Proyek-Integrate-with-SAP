@extends('./layout')

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
		<div class="nav-tabs-custom">            
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> {{$dokumen->unit_asal->nama_unit}}</a></li>
				<li><a href="#">{{$dokumen->sub_jenis_dokumen->jenis_dokumen->nama_jenis}}</a></li>
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
						alt : <a href="{{url('/dokumen/file')}}/{{$dokumen['id']}}">test.pdf</a>
					</object>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="detail_file">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>ID Dokumen</td>
								<td>{{$dokumen['id']}}</td>
							</tr>
							<tr>
								<td>Jenis Dokumen</td>
								<td>{{$dokumen->sub_jenis_dokumen->jenis_dokumen->nama_jenis}} / {{$dokumen->sub_jenis_dokumen->nama_sub}} ({{$dokumen->sub_jenis_dokumen->singkatan}})</td>
							</tr>
							<tr>
								<td>Nama Pengadaan</td>
								<td></td>
							</tr>
							<tr>
								<td>Nama Dokumen</td>
								<td>{{$dokumen['nama_dokumen']}}</td>
							</tr>
							<tr>
								<td>Nomor Dokumen</td>
								<td>{{$dokumen['no_dokumen']}}</td>
							</tr>
							<tr>
								<td>Asal Dokumen</td>
								<td><a href="">{{$dokumen->unit_asal->nama_unit}}</a></td>
							</tr>
							<tr>
								<td>Tujuan Dokumen</td>
								<td><a href="">{{$dokumen->unit_tujuan->nama_unit}}</a></td>
							</tr>
							<tr>
								<td>Nomer PO</td>
								<td><a href="">7201230</a></td>
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
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<h3 class="box-title">Pra Pengadaan</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body no-padding">
									<table class="table">
										<tbody>
											@foreach($level_sub as $value)
											<tr>
												<td>{{$value->sub_jenis_dokumen->nama_sub}} ({{$value->sub_jenis_dokumen->singkatan}})</td>
												<td><a href="{{url('dokumen/detail/')}}">{{$dokumen['no_dokumen']}}</a></td>
												<td><a href="{{url('dokumen/upload')}}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> Upload Dokumen</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
									</div>
							</div><!-- /.box -->
						</div><!-- /.col -->
						<div class="col-md-12">
							<div class="box box-default box-solid collapsed-box">
								<div class="box-header with-border">
									<h3 class="box-title">Dokumen Pengadaan</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body no-padding">
									<table class="table">
									<tbody>
										<tr>
											<th style="width: 10px">#</th>
											<th>Task</th>
											<th>Progress</th>
											<th style="width: 40px">Label</th>
										</tr>
										<tr>
											<td>1.</td>
											<td>Update software</td>
											<td>
											<div class="progress progress-xs">
											<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
											</div>
											</td>
											<td><span class="badge bg-red">55%</span></td>
										</tr>
										<tr>
											<td>2.</td>
											<td>Clean database</td>
											<td>
											<div class="progress progress-xs">
											<div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
											</div>
											</td>
											<td><span class="badge bg-yellow">70%</span></td>
										</tr>
										<tr>
										<td>3.</td>
										<td>Cron job running</td>
										<td>
										<div class="progress progress-xs progress-striped active">
										<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
										</div>
										</td>
										<td><span class="badge bg-light-blue">30%</span></td>
										</tr>
										<tr>
										<td>4.</td>
										<td>Fix and squish bugs</td>
										<td>
										<div class="progress progress-xs progress-striped active">
										<div class="progress-bar progress-bar-success" style="width: 90%"></div>
										</div>
										</td>
										<td><span class="badge bg-green">90%</span></td>
										</tr>
									</tbody></table>
									</div>
							</div><!-- /.box -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div>
			</div>
		</div>
@stop