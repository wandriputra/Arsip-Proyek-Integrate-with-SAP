<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Datamaster Dokumen<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/data/tambah-jra')}}">Tambah Jadwal Retensi Arsip</a></li>
    <li><a href="{{url('/data/tambah-actifity')}}">Tambah Actifity Dokumen</a></li>
    <li><a href="{{url('/data/insert-sub-jenis')}}">Tambah Jenis Dokumen</a></li>
    <li class="divider"></li>
    <li><a href="{{url('/data/list-jra')}}">List Jadwal Retensi Arsip</a></li>
    <li><a href="{{url('/data/list-actifity')}}">List Actifity Dokumen</a></li>
    <li><a href="{{url('/data/list-sub-jenis')}}">List Jenis Dokumen</a></li>
  </ul>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator Area<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/auth/tambah-user')}}">Tambah User/Pengguna</a></li>
    <li><a href="{{url('/personil/tambah-personil')}}">Tambah Personil Anggota Proyek</a></li>
    <li><a href="{{url('sap/upload-excel')}}">Tambah Unit/Proyek</a></li>
    <li class="divider"></li>
    <li><a href="{{url('/auth/list-user')}}">List User</a></li>
    <li><a href="{{url('/personil/list-personil')}}">List Personil</a></li>
    <li><a href="{{url('unit/list-unit')}}">List Unit</a></li>
  </ul>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hrga Area<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('hrga/upload-excel')}}">Update File ZCPS1013 / SAP</a></li>
    <li><a href="{{url('hrga/view-upload-data')}}">Riview File ZCPS1013 / SAP</a></li>
    <li><a href="{{url('hrga/list-zpc')}}">List File ZCPS1013 / SAP</a></li>
    <li class="divider"></li>
    <li><a href="{{url('hrga/role-module')}}">Role User</a></li>
    <li><a href="">Verifikasi Dokumen</a></li>
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