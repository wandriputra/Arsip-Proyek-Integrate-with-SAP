<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apalikasi Arsip Proyek Indarung VI | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/square/blue.css')}}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">

      <div class="login-logo">
        <a href="{{url('asset/index2.html')}}"><b>ARSIP INDARUNG-VI</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      @if (count($errors) > 0)
          <div class="alert alert-dismissible alert-warning">
              <button type="button" class="close" data-dismiss="alert">×</button>
            <b>LOGIN GAGAL! </b><br>
            Mohon Periksa Kembali Username dan Password.
          </div>
      @endif
      @if (Session::has('messages'))
          <div class="alert alert-dismissible alert-warning">
              <button type="button" class="close" data-dismiss="alert">×</button>
            <b>{{ Session::get('messages') }}</b>
          </div>
      @endif
        <p class="login-box-msg">Sign in to start your session</p>
        <form role="form" method="POST" action="{{ url('/auth/login') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="{{url('reset_password')}}">Lupa Password</a><br>
        <a href="{{url('register')}}" class="text-center">Minta Akses Login</a>

      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('asset/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('asset/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('asset/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
