<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Aplikasi <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/dokumen/detail')}}">Detail Dokumen</a></li>
    <li><a href="{{url('/dokumen/upload')}}">View Personil</a></li>
    <li class="divider"></li>
    <li><a href="{{url('/dokumen/folder')}}">Folder</a></li>
  </ul>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator Menu <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/auth/tambah-user')}}">Tambah User</a></li>
    <li><a href="{{url('/auth/list-user')}}">List User</a></li>
  </ul>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personil <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/personil/tambah-personil')}}">Tambah Personil</a></li>
    <li><a href="{{url('/personil/list-personil')}}">List Personil</a></li>
  </ul>
</li>

@section('sidebar_content')
@parent
  <div class="box box-default">
    <div class="box-body">
    <!-- /.box-body -->
    </div>
  </div>
@stop