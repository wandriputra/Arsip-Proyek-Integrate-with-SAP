<hr>
<ul class="nav nav-stacked">
	<li>
		@foreach($folder as $val)
			<div class="col-md-2">
				<a href="{{url('folder/index')}}">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center">{{$folder->po}}</p>
				</a>
			</div>
		@endforeach
	</li>
</ul>
<hr>
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
							<td>No PR :</td>
							<td>No PO : </td>
							<td></td>
						</tr>
						
					</table>
				</div>
			</div>
		</a>
	</li>
	@endforeach
</ul>