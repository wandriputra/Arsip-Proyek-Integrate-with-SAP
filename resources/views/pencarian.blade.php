@extends('./layout')

@section('costom_style_pages')
<style>
	.link-pencarian{
		font-weight: normal;
	}
	.padding-gambar{
		padding-top: 0px;
	}
</style>
@stop

@section('content_main_pages')
<div class="box box-primary">
	<div class="box-header">
		<form action="#" method="get" class="">
			<div class="input-group">
				<input name="q" class="form-control" id="form-pencarian" placeholder="Pencarian..." type="text">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat bg-blue"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
	</div>
	<div class="box-body">
		<div id="hasil-pencarian">
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
				@foreach($dokumen as $dokumen)
				<li>
					<a href="{{url('dokumen/detail')}}/{{$dokumen['id']}}" class="link-pencarian">
						<div class="row">
							<div class="col-md-2">
								<img src="{{url('data/pdf.png')}}" alt="" width="100%">
							</div>
							<div class="col-md-10">
								<table class="table-hover">
									<tr>
										<td>Nama File</td>
										<td>:</td>
										<td>{{$dokumen['no_dokumen']}}</td>
									</tr>
									<tr>
										<td>Nama Pengadaan</td>
										<td>:</td>
										<td>{{$dokumen['nama_dokumen']}}</td>
									</tr>
									<tr>
										<td>WBS Area</td>
										<td>:</td>
										<td>{{$dokumen['created_at']}}</td>
									</tr>
									<tr></tr>
									<tr>
										<td>No PR :</td>
										<td>No PO : </td>
										<td></td>
									</tr>
									<tr>
										<td>{{$dokumen->dokumen_pr->pr or 'Belum Ada PR'}}</td>										
										<td>{{$dokumen->dokumen_pr->pr or 'Belum Ada PO'}}</td>
										<td></td>									
									</tr>
									<tr>
										<td>{{$dokumen->dokumen_po->po or 'Belum Ada PR'}}</td>
										<td>{{$dokumen->dokumen_po->po or 'Belum Ada PO'}}</td>
										<td></td>
									</tr>
								</table>
							</div>
						</div>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@stop

@section('costom_js_pages')
<script>
	$(function(){
		$('#form-pencarian').change(function(){
			console.log($('#form-pencarian').val());
		})
	});	
</script>
@stop