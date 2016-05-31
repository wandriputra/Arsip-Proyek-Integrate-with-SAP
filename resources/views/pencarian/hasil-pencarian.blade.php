@if(count($dokumen) >= 1)
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th class="text-center">Nama Dokumen</th>
			<th class="text-center">No. Dokumen</th>
			<th class="text-center">No. SAP</th>
		</tr>
		<?php $i=1 ?>
		@foreach($dokumen as $dokumen)
		<tr>
			<td>{{$i++}}</td>
			<td><a href="{{url('dokumen/detail')}}/{{$dokumen->id_dokumen}}">{{$dokumen->nama_dokumen}}</a></td>
			<td class="text-center"><a href="{{url('dokumen/detail')}}/{{$dokumen->id_dokumen}}">{{$dokumen->no_dokumen}}</a></td>
			<td><a href="{{url('dokumen/detail')}}/{{$dokumen->id_dokumen}}">{{$dokumen->no_sap}}</a></td>
		</tr>

		@endforeach
	</table>
@endif

@if(count($folder) >= 1)
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
