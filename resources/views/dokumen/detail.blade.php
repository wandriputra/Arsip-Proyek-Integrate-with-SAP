@extends('./layout')

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
<div class="row">
	<div class="col-md-3">	
		<div class="box box-default">
			<div class="box-body">
				
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-md-9">


		<div class="nav-tabs-custom">            
			<ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-home"></i> AFIS</a></li>
              <li><a href="#">Pengadaan Radio</a></li>
              <li class="active">Korin Permintaan Pengadaan</li>
            </ol>
            <ul class="nav nav-tabs">
				<li class="active"><a href="#file_pdf" data-toggle="tab">File PDF</a></li>
				<li><a href="#detail_file" data-toggle="tab">Detail</a></li>
				<li><a href="#dokumen_terkait" data-toggle="tab">Dokumen Terkait</a></li>
            </ul>
            <div class="tab-content">
				<div class="active tab-pane" id="file_pdf">
					<object data="{{url('/data/test.pdf')}}" type="application/pdf" width="100%" height="600">
						alt : <a href="{{url('/data/test.pdf')}}">test.pdf</a>
					</object>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="detail_file">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Nama</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ID Dokumen</td>
								<td>01</td>
							</tr>
							<tr>
								<td>Jenis Dokumen</td>
								<td>Korin Permintaan Pengadaan (KPP)</td>
							</tr>
							<tr>
								<td>Nama Dokumen</td>
								<td>Korin Permintaan Pengadaan Radio HT 100 Unit</td>
							</tr>
							<tr>
								<td>Nomor Dokumen</td>
								<td>PIND6/KRN/ICT/001</td>
							</tr>
							<tr>
								<td>Nomer PR</td>
								<td><a href="">7201230</a></td>
							</tr>
							<tr>
								<td>Nomer PO</td>
								<td><a href="">7201230</a></td>
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
					<!-- The timeline -->
					<ul class="timeline timeline-inverse">
						<li>
							<div class="timeline-item">
								<h3 class="timeline-header">Dokumen Pengadaan</h3>
								<div class="timeline-body">
									<table class="table">
										<thead>
											<tr>
												<th>Jenis</th>
												<th>No Dokumen</th>
												<th>Nama</th>
												<th>Upload</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>PO</td>
												<td><a href="">Po 070402342</a></td>
												<td>Nama Dokumen asdada</td>
												<td>Procurement</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</li>
						<li>
							<div class="timeline-item">
								<h3 class="timeline-header">Dokumen Pengadaan</h3>
								<div class="timeline-body">
									<table class="table">
										<thead>
											<tr>
												<th>Jenis</th>
												<th>No Dokumen</th>
												<th>Nama</th>
												<th>Upload</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>PO</td>
												<td><a href="">Po 070402342</a></td>
												<td>Nama Dokumen asdada</td>
												<td>Procurement</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</li>
						<li>
							<div class="timeline-item">
								<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
								<div class="timeline-body">
									<img src="http://placehold.it/150x100" alt="..." class="margin">
									<img src="http://placehold.it/150x100" alt="..." class="margin">
									<img src="http://placehold.it/150x100" alt="..." class="margin">
									<img src="http://placehold.it/150x100" alt="..." class="margin">
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div><!-- /.tab-content -->
		</div><!-- /.nav-tabs-custom -->
	</div>
</div>
@stop