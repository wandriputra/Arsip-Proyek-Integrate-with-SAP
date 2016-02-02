<ul class="nav nav-stacked">
	<li>
		<a href="http://localhost/arsip_indarung6/dokumen/detail/4">
			<div class="row">
				<div class="col-md-2">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
				</div>
				<div class="col-md-10">
					<h5 class="header">Nama Pengadaan</h5> PR NO: 7213123 <br> PO NO: 12312334</p>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="http://localhost/arsip_indarung6/dokumen/detail/4">
			<div class="row">
				<div class="col-md-2">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
				</div>
				<div class="col-md-10">
					<h5 class="header">Nama Pengadaan</h5> PR NO: 7213123 <br> PO NO: 12312334</p>
				</div>
			</div>
		</a>
	</li>				
	</ul>
	<ul class="nav nav-stacked">
	@foreach($dokumen as $dokumen)
	<li>
		<a href="{{url('dokumen/detail')}}/{{$dokumen->id_dokumen}}" class="link-pencarian">
			<div class="row">
				<div class="col-md-2">
					<img src="{{url('data/pdf.png')}}" alt="" width="100%">
				</div>
				<div class="col-md-10">
					<table class="table-hover">
						<tr>
							<td>Nama File</td>
							<td>:</td>
							<td>{{$dokumen->no_dokumen}}</td>
						</tr>
						<tr>
							<td>Nama Pengadaan</td>
							<td>:</td>
							<td>{{$dokumen->nama_dokumen}}</td>
						</tr>
						<tr>
							<td>WBS Area</td>
							<td>:</td>
							<td>{{$dokumen->created_at}}</td>
						</tr>
						<tr></tr>
						<tr>
							<td></td>
							<td>No PR :</td>
							<td>No PO : </td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>{{$dokumen->pr or 'Belum Ada PR'}}</td>										
							<td>{{$dokumen->po or 'Belum Ada PO'}}</td>
							<td></td>									
						</tr>
						<tr>
							<td></td>
							<td>{{$dokumen->po or 'Belum Ada PR'}}</td>
							<td>{{$dokumen->pr or 'Belum Ada PO'}}</td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
		</a>
	</li>
	@endforeach
</ul>