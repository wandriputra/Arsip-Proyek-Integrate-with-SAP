@extends('./layout')

@section('costom_style_pages')
<style>
	.link-pencarian{
		font-weight: normal;
	}
	.padding-gambar{
		padding-top: 0px;
	}
	.padding-form-pencarian{
		padding: 20px;
	}
	.find-result{
		padding-bottom: -10px;
		border-width: 1px 0px 0px;
		border-style: solid none none;
		border-color: #EEE -moz-use-text-color -moz-use-text-color;
	}
</style>
@stop

@section('content_main_pages')
<div class="box box-primary">
	<div class="box-header">
		<form action="{{url('pencarian')}}" method="get" class="form-horizontal">
			<div class="input-group col-md-offset-1 col-md-10 padding-form-pencarian">
				<input name="q" class="form-control" id="form-pencarian" type="text" value="{{$input or ''}}">
				<span class="input-group-btn">
					<button type="submit" id="search-btn" class="btn btn-flat bg-blue"><i class="fa fa-search"></i> Cari</button>
				</span>
			</div>
		</form>
	</div>
	<div class="box-body">
		<div id="hasil-pencarian">
			@if($input == '')
				<p class="text-center"><i>.: Ketikkan Keyword Untuk Memulai Pencarian :.</i></p>
			@else
				@include($include)
			@endif
		</div>
	</div>
	<div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">«</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">»</a></li>
      </ul>
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

	$('#form-pencarian').change(function(){
		// $.get
	})
</script>
@stop