<div class="form-group">
	<label class="col-sm-3 control-label">Visibility Dokumen</label>
	<div class="col-sm-8 radio">
	@foreach($visibility as $visibility)
		<label>
			<input name="visibility" class="minimal" value="{{$visibility['id']}}" checked="" type="radio">
			{{$visibility['jenis_visibility']}}
		</label>
	@endforeach
	</div>
</div>