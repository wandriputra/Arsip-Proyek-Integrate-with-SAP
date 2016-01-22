@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop

@section('content_main_pages')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah User</h3>
	</div>
	<div class="box-body">
	@if (count($errors) > 0)
		<div class="alert alert-dismissible alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Mohon Periksa Kembali input.
		</div>
	@endif
		<form method="post" class="form-horizontal" action="{{{ isset($url) ? url($url) : url('auth/tambah-user') }}}">
		{{csrf_field()}}
			<input type="hidden" name="id" class="form-control" value="{{{$user['id'] or ''}}}">
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Username</label>
				<div class="col-md-5">
					<input type="text" name="username" class="form-control" value="{{{ $user['username'] or ''}}}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Password</label>
				<div class="col-md-5">
					<input type="password" name="password" class="form-control" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Konfirmasi Password</label>
				<div class="col-md-5">
					<input type="password" name="password_confirmation" class="form-control" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Personil</label>
				<div class="col-md-5">
					<select name="personil_id" id="" class="select-pl"  style="width: 90%;">
						<option value="{{{ $user['personil_id'] or '' }}}">{{{ $user['personil']['nama_personil']  or ''}}} </option>
						@foreach($personil as $personil)
						<option value="{{$personil['id']}}">{{$personil['nama_personil']}}</option>
						@endforeach
					</select> <a href="{{url('personil/tambah-personil')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Role User</label>
				<div class="col-md-5">
					<select name="role_user_id" id="" class="select-pl" style="width: 90%;">
						<option value="{{{ $user['role_user_id'] or '' }}}">{{{ $user['role_user']['nama_role'] or '' }}}</option>
						@foreach($role_user as $role_user)
						<option value="{{$role_user['id']}}">{{$role_user['nama_role']}}</option>
						@endforeach
					</select> <a href="{{url('role-user/tambah')}}"><i class="fa fa-fw fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status User</label>
				<div class="col-md-5">
					<div class="radio">
						<label for="">
							<input type="radio" name="status" class="minimal" checked="true" value="A"></label> Aktif
						</label>
					</div>		
					<div class="radio">
						<label for="">
							<input type="radio" name="status" class="minimal" value="N"> Nonaktif
						</label>
					</div>
				</div>
			</div>
	</div>
	<div class="box-footer">
		<div class="">
			<button type="reset" class="btn btn-default col-md-2">Reset</button>
			<button type="submit" class="btn btn-info col-md-2 pull-right">Tambah</button>
		</div>
	</div><!-- /.box-footer -->
	</form>
</div>
@stop

@section('costom_js_pages')
	<script src="{{ url('asset/plugins/select2/select2.full.min.js')}}"></script>
	<script src="{{ url('asset/plugins/iCheck/icheck.min.js')}}"></script>
	<script>
		$(function() {
			$(".select-pl").select2(); 
		});
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-red',
			radioClass: 'iradio_minimal-red'
		});
	</script>
@stop