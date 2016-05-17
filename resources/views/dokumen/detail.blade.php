@extends('./layout')

@section('costom_style_pages')
	<link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
	<style>

		a.nama-dokumen {
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: N; /* number of lines to show */
			line-height: X;        /* fallback */
			max-height: X*N;       /* fallback */
		}

		.box-header > .fa{
			font-size: 12px;
		}

		.tebal{
			font-weight: 500;
		}

	</style>
	@stop

	@section('content_main_pages')
			<!-- SELECT2 EXAMPLE -->
	<div class="nav-tabs-custom">
		<ol class="breadcrumb">
			<li>
				<a href="#"><i class="fa fa-home"></i>{{$dokumen->asal_surat->nama_unit}}</a></li>
			<li>
				<a href="#">{{$dokumen->sub_jenis_dokumen->actifity->nama_actifity}}</a>
			</li>
			<li class="active">
				{{$dokumen['nama_dokumen']}}
			</li>
		</ol>

		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#file_pdf" data-toggle="tab">File PDF</a>
			</li>
			<li>
				<a href="#detail_file" data-toggle="tab">Detail</a>
			</li>
			<li>
				<a href="#dokumen_terkait" data-toggle="tab">Dokumen Terkait</a>
			</li>
		</ul>

		<div class="tab-content">

			<div class="active tab-pane" id="file_pdf">
				<object data="{{url('/dokumen/file-pdf')}}/{{$dokumen->id}}" type="application/pdf" width="100%" height="700">
					<p>Pastikan anda telah melakukan update browser ke versi terbaru untuk menikmati fitur <b>Aplikasi Arsip Indarung VI</b> secara penuh.
						Dan jika masih belum bisa membuka file ini lewat browser maka matikan Aplikasi Download yang ada pada Komputer / Laptop.
						File : <a href="{{url('/dokumen/file-pdf')}}/{{$dokumen['id']}}">{{$dokumen['nama_dokumen']}}</a>
					</p>
				</object>
			</div>

			<div class="tab-pane" id="detail_file">
				<table class="table table-striped">
					<tr>
						<td>ID Dokumen</td>
						<td class="tebal">{{$dokumen->id}}</td>
					</tr>
					<tr>
						<td>Sub Jenis Dokumen</td>
						<td class="tebal">{{$dokumen->sub_jenis_dokumen->actifity->nama_actifity}}</td>
					</tr>
					<tr>
						<td>Jenis Dokumen</td>
						<td class="tebal">{{$dokumen->sub_jenis_dokumen->singkatan}} / {{$dokumen->sub_jenis_dokumen->nama_sub}} ({{$dokumen->sub_jenis_dokumen->singkatan}})</td>
					</tr>
					<tr>
						<td>Kode Arsip</td>
						<td class="tebal">{{$dokumen->jra_dokumen->kode}} / {{$dokumen->jra_dokumen->jenis_arsip}}<br>
							Jangka Waktu Simpan Inaktif {{$dokumen->jra_dokumen->waktu_inaktif}} Tahun
						</td>
					</tr>
					<tr>
						<td>Nama Pengadaan</td>
						<td class="tebal">//data diambil dari papi//</td>
					</tr>
					<tr>
						<td>Nama Dokumen</td>
						<td class="tebal">{{$dokumen['nama_dokumen'] or 'kosong'}}</td>
					</tr>
					<tr>
						<td>Nomor Dokumen</td>
						<td class="tebal">{{$dokumen['no_dokumen']}}</td>
					</tr>
					<tr>
						<td>Asal Dokumen</td>
						<td class="tebal"><a href="{{url("/dokumen/unit/")."/".$dokumen->asal_surat->id}}">{{$dokumen->asal_surat->nama_unit}}</a></td>
						{{--TODO: tambah  link valid ke file unit yang bersangkutan--}}
					</tr>
					<tr>
						<td>Tujuan Dokumen</td>
						<td class="tebal"><a href="">{{$dokumen->tujuan_surat->nama_unit or '-'}}</a></td>
					</tr>
					<tr>
						<td>Nomer {{strtoupper($type_sap)}}</td>
						<td class="tebal">
							@foreach($no_sap as $value)
								<a href="{{url('dokumen/sap')."/".$value."/".$value}}">{{$value}}</a>,
							@endforeach
							<a href="{{url('dokumen/tambah-sap-dokumen').'/'.'dokumen'}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i></a>
						</td>
					</tr>
					<tr>
						<td>Tembsuan</td>
						<td class="tebal">
							@foreach($dokumen->dokumen_tembusan as $tembusan)
								<a href="">{{$tembusan->nama_unit}} </a><br>
							@endforeach
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td class="tebal"><span class="@if($dokumen->status_dokumen->id === 1) btn-success @else btn-danger @endif btn-xs">{{strtoupper($dokumen->status_dokumen->nama_status)}}</span></td>
					</tr>
					@if(Auth::user()->role_user->has_module('verify_dokumen'))
						@include("dokumen.detail-hrga")
					@endif
				</table>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="dokumen_terkait">

			</div>
		</div>
	</div>

	{{--modals--}}
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form action="{{url('dokumen/tambah-no-sap')}}" method="get">
					<input type="hidden" name="id" value="{{$dokumen['id']}}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah {{strtoupper($type_sap)}}</h4>
					</div>
					<div class="modal-body">
						<select class="form-control {{'select_'.$type_sap}}" name="{{$type_sap}}" style="width: 100%;">
						</select>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</form>
			</div>
		</div>

	</div>
@stop

@section('costom_js_pages')
	@include('dokumen.scriptUpload')
@stop

