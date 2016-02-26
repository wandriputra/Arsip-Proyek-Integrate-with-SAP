@if(count($dokumen) >= 1)
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
								<td>No SAP :</td>
								<td></td>
								<td></td>
							</tr>
							
						</table>
					</div>
				</div>
			</a>
		</li>
		@endforeach
		
	</ul>
@endif
@if(count($folder) >= 1)
<hr>
<ul class="nav nav-stacked">
	<li>
		@foreach($folder as $key => $val)
			<div class="col-md-2" style="height: 150px">
				@if(stripos($val->short_text, $input))
				<a href="{{url('dokumen/sap')}}/pr/{{$val->pr}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					{{$val->short_text}}
				@elseif(stripos($val->po, $input))
				<a href="{{url('dokumen/sap')}}/po/{{$val->po}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					po : {{$val->po}}
				@elseif(stripos($val->pr, $input))
				<a href="{{url('dokumen/sap')}}/pr/{{$val->pr}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					pr : {{$val->pr}}
				@elseif(stripos($val->cd, $input))
				<a href="{{url('dokumen/sap')}}/cd/{{$val->cd}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					cd : {{$val->cd}}
				@elseif(stripos($val->gr, $input))
				<a href="{{url('dokumen/sap')}}/gr/{{$val->gr}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					gr : {{$val->gr}}
				@elseif($val->po=='')
				<a href="{{url('dokumen/sap')}}/pr/{{$val->pr}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					pr : {{$val->pr}}
				@else
				<a href="{{url('dokumen/sap')}}/po/{{$val->po}}" style="padding-top: -15px">
					<img src="{{url('data/folder.png')}}" alt="" width="100%">
					<p class="folder-name text-center" style="overflow: hidden; text-overflow: clip;">
					po : {{$val->po}}
				@endif
					</p>
				</a>
			</div>
		@endforeach
	</li>
</ul>
@endif
