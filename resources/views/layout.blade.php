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

    @yield('important_css')

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
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Dokumen<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('/data/tambah-actifity')}}">Tambah Actifity Dokumen</a></li>
                    <li><a href="{{url('/data/list-actifity')}}">List Actifity Dokumen</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('/data/insert-sub-jenis')}}">Insert Sub Jenis Dokumen</a></li>
                    <li><a href="{{url('/data/list-sub-jenis')}}">List Sub Jenis Dokumen</a></li>
                  </ul>
                </li>
                  @if(Auth::user()->role_user->nama_role === 'Administrator')
                    @include('_include.admin_menu')
                  @elseif(Auth::user()->role_user->nama_role === 'Uploader HRGA')
                    @include('_include.uploader_menu')
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
              @section('sidebar_content')
                <div class="box box-default">
                  <div class="box-body">
                    <p class="text-center">Menu Aplikasi</p>
                    <ul class="nav nav-stacked">
                      <li>
                        <a href="{{url('pencarian')}}"><i class="fa fa-search"></i> Pencarian</a>
                      </li>
                      <li>
                        <a href="{{url('folder')}}"><i class="fa fa-folder-o"></i> Folder</a>
                      </li>
                      <li>
                        <a href="{{url('dokumen/list-file')}}"><i class="fa fa-file"></i> File {{Auth::user()->personil->unit->singkatan}}</a>
                      </li>
                      <li>
                        <a href="{{url('dokumen/upload')}}"><i class="fa fa-upload"></i> Upload Dokumen</a>
                      </li>
                    </ul>
                  </div>
                </div>
              @show
              </div>
              <div class="col-md-9">
                  <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
                      @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                    @endforeach
                  </div> <!-- end .flash-message -->
                  
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
            <b>Version</b> Alpha Development.
          </div>
          <strong>Copyright &copy; 2016-2017 <a href="http://indarung6.semenpadang.co.id">Proyek Indarung VI</a>.</strong> All rights reserved.
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
