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
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Aplikasi <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/dokumen/detail')}}">Detail Dokumen</a></li>
    <li><a href="{{url('/dokumen/upload')}}">Upload</a></li>
    <li class="divider"></li>
    <li><a href="{{url('/folder')}}">Folder</a></li>
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
      <p class="text-muted text-center">Jenis Dokumen</p>
      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <a class="" href="{{url('pencarian')}}">Dokumen Pengadaan PO</a>
        </li>
        <li class="list-group-item">
          <a class="" href="">Dokumen Pengadaan Non PO</a>
        </li>
        <li class="list-group-item">
          <a class="" href="">Dokumen Non Pengadaan</a>
        </li>
        <li class="list-group-item">
          <a class="" href="">Dokumen SPJ</a>
        </li>
      </ul>
    </div>
  </div>
@stop