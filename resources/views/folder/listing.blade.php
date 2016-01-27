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
		<h3 class="box-title">{{Auth::user()->personil->unit->nama_unit}}</h3>
		<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New Folder</button>
	</div>

	<div class="box-body">
		@foreach($folder as $val)
		<div class="col-md-2">
			<a href="{{url('folder/index')}}/{{$val->id}}">
				<img src="{{url('data/folder.png')}}" alt="" width="100%">
				<p class="folder-name text-center">{{$val->nama_folder}}</p>
			</a>
		</div>
		@endforeach

		@foreach($file as $val)
		<div class="col-md-2">
			<a href="{{url('dokumen/detail/')}}/{{$val->id}}">
				<img src="{{url('data/pdf.png')}}" alt="" width="100%">
				<p class="folder-name text-center">{{$val->nama_dokumen}}</p>
			</a>
		</div>
		@endforeach
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
			<form action="{{url('folder/new-folder')}}" method="post" class="form-horizontal">
				<div class="form-group">
					<div class="col-md-10">
					{{csrf_field()}}
					<input type="hidden" name="unit_id" value="{{Auth::user()->personil->unit->id}}">
					<input type="hidden" name="folder_induk" value="{{{$id}}}">
						<input type="text" name="nama_folder" class="form-control" placeholder="Nama Folder">
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-success" width='100%'>Buat</button>
					</div>
				</div>
			</form>
    	</div>
    </div>
</div>
	
@stop