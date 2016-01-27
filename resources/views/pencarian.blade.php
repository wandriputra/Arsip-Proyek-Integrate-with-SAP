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
					<div class="row">
						<a href="http://localhost/arsip_indarung6/dokumen/detail/4" class="link-pencarian">
						<div class="col-sm-2">
							<img src="{{url('data/folder.png')}}" alt="" width="100%" class="padding-gambar">
						</div>
						<div class="col-sm-9">
							<h5 class="header">Dokumen Pengadaan</h3> PR NO: 7213123 <br> PO NO: 12312334</p>
							</div>
						</a>
					</div>
				</li>
				<li>
					<div class="row">
						<a href="http://localhost/arsip_indarung6/dokumen/detail/2" class="link-pencarian">
						<div class="col-sm-2">
							<img src="{{url('data/pdf.png')}}" alt="" width="100%" class="padding-gambar">
						</div>
						<div class="col-sm-9">
							<h5 class="header">Dokumen Pengadaan</h3> PR NO: 7213123 <br> PO NO: 12312334</p>
							</div>
						</a>
					</div>
				</li>
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