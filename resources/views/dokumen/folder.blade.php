@extends('./layout')

@section('costom_style_pages')
	<style>
		p .folder-name{
			text-align: center;
		}
	</style>
@stop

@section('content_main_pages')
<div class="box box-default ">
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> AFIS</a></li>
		<li><a href="#">Pengadaan Radio</a></li>
		<li class="active">Korin Permintaan Pengadaan</li>
	</ol>
	<div class="box-header with-border">
		<h3 class="box-title">nama folder</h3>
		<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New Folder</button>
	</div>

	<div class="box-body">
		<div class="col-md-2">
			<a href="" >
				<img src="{{url('data/folder.png')}}" alt="" width="100%">
				<p class="folder-name">Lorem ipsum asd asd </p>
			</a>
		</div>
		<div class="col-md-2">
			<a href="" >
				<img src="{{url('data/folder.png')}}" alt="" width="100%">
				<p class="folder-name">Lorem ipsum asd asd </p>
			</a>
		</div>
		<div class="col-md-2">
			<a href=""  >
				<img src="{{url('data/folder.png')}}" alt="" width="100%">
				<p class="folder-name">Lorem ipsum asd asd </p>
			</a>
		</div>
	</div>
	<div class="box-footer">
		
	</div>
</div>

<!-- modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Tambah Folder</h4>
		</div>
		<div class="modal-body">
			<form action="" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="" class="form-label">Nama Folder</label>
					<div class="col-md-4">
						<input type="text" class="form-control">
					</div>
			</form>
		</div>
    </div>

  </div>
</div>
	
@stop