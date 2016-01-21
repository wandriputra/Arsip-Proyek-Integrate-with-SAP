<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@section('title_pages') Aplikasi Arsip Proyek Indarung VI @show</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/ionicons.min.css')}}">
    
    @yield('costom_style_pages')

    <link rel="stylesheet" href="{{url('asset/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{url('asset/dist/css/skins/skin-red.css')}}">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-red layout-top-nav">
    <div class="wrapper">
      
      <header class="main-header">
      @section('header_pages')
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="{{url('/')}}" class="navbar-brand"><b>ARSIP INDARUNG-VI</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  @if(Auth::user()->role_user->nama_role === 'Administrator')
                    @include('_template.admin.header_menu')
                  @elseif(Auth::user()->role_user->nama_role === 'Uploader HRGA')
                    @include('_template.uploader.header_menu')
                  @endif
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      @if(Auth::user()->personil->nama_personil != 'null')
                        {{Auth::user()->personil->nama_personil}}
                      @else
                        Username
                      @endif
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{url('auth/profil')}}">Profile</a></li>
                      <li class="divider"></li>
                      <li><a href="{{url('auth/logout')}}">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
          </div>
        </nav>
      @show
      </header>

      @section('content_pages')
      <div class="content-wrapper">
        <div class="container">
          <section class="content">
            <div class="row">
              <div class="col-md-3">  
                <div class="box box-default">
                  <div class="box-body">
                    <!-- /.box-body -->
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                  @section('content_main_pages')
                  @show
              </div>
            </div>
          </section>
        </div>
      </div>
      @show

      @section('footer_pages')
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
      @show

    </div><!-- ./wrapper -->
    
    <!-- jQuery 2.1.4 -->
    <script src="{{url('asset/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('asset/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('asset/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('asset/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('asset/dist/js/app.js')}}"></script>
    @yield('costom_js_pages')

  </body>
</html>
