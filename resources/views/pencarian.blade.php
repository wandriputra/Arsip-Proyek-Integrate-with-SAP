@extends('./layout')

@section('important_css')
<style>
	.link-pencarian{
		font-weight: normal;
	}

	.box-header{
		background-color: #f5f5f5;
	}

	.form-pencarian{
		padding-top: 10px;
	}
	.padding-gambar{
		padding-top: 0px;
	}

	.find-result{
		padding-bottom: -10px;
		border-width: 1px 0px 0px;
		border-style: solid none none;
		border-color: #EEE -moz-use-text-color -moz-use-text-color;
	}

	.nav-search > li {
	    float: left;
	    padding-bottom: -10px;
	    margin-top: 10px;
	}

	.active{
		border-bottom: 3px solid #444;
	}

	.box-header {
		padding-bottom: 0px;
	}

	hr{
		padding: 0px;
		margin: 0px;
		margin-top: 10px;
	}

</style>
@stop

@section('content_main_pages')
<div class="box box-primary">
	<div class="box-header">
		<form action="{{url('pencarian')}}" method="get" class="form-horizontal">
			<div class="input-group col-md-offset-1 col-md-10 form-pencarian">
				<input type="hidden" name="type" value="{{$type or 'file_pdf'}}">
				<input name="q" class="form-control" id="form-pencarian" type="text" value="{{$input or ''}}">
				<span class="input-group-btn">
					<button type="submit" id="search-btn" class="btn btn-flat bg-blue"><i class="fa fa-search"></i> Cari</button>
				</span>
			</div>
			<hr>
			<div class="col-md-12">
				<ul class="nav nav-search">
					<li class="{{ $type=='file_pdf' ? 'active' : '' }}"><a href="{{url('pencarian')}}?type=file_pdf&q={{ isset($input) ? $input : '' }}">File Pdf</a></li>
					<li class="{{ $type=='wbs_area' ? 'active' : '' }}"><a href="{{url('pencarian')}}?type=wbs_area&q={{ isset($input) ? $input : '' }}">WBS Area</a></li>
					<li class="{{ $type=='no_sap' ? 'active' : '' }}"><a href="{{url('pencarian')}}?type=no_sap&q={{ isset($input) ? $input : '' }}">No SAP</a></li>
	            </ul>
			</div>
		</form>
	</div>
	<div class="box-body">
		<div id="hasil-pencarian">
			@if($input == '' || count($dokumen)<1 && count($folder) <1)
				<p class="text-center"><i>.: Ketikkan Keyword Untuk Memulai Pencarian :.</i></p>
			@else
				@include($include)
			@endif
		</div>
	</div>
	@if(count($dokumen)>=1 || count($folder) >=1)
	@if($input !='')
	<div class="box-footer clearfix text-center">
		@if(count($dokumen) > count($folder))
			{!! $dokumen->appends(['q' => $input, 'type'=> $type])->render() !!}
		@else
			{!! $folder->appends(['q' => $input, 'type'=> $type])->render() !!}
		@endif
    </div>
    @endif
    @endif
</div>
@stop

@section('costom_js_pages')
<script>
	$(function(){
		$('#form-pencarian').change(function(){
			console.log($('#form-pencarian').val());
		})
	});

	$('#form-pencarian').change(function(){
		// $.get
	})
</script>
@stop