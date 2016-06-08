<div class="form-group">
    <label class="col-sm-2 control-label">Actifity</label>
    <div class="col-sm-8">
        <select class="form-control select2" name="actifity" id="actifity" style="width: 95%;">
        </select>
    </div>
</div>

<div class="form-group jenis-dokumen">
    <label class="col-sm-3 control-label">Jenis Dokumen</label>
    <div class="col-sm-7 select-box">
        <select class="form-control select-remote-data" name="jenis_dokumen[]" id="sub_jenis_dokumen" style="width: 95%;">
        </select>
        <a href="{{url('data/insert-sub-jenis')}}" class="add-jenis-link">
            <i class="fa fa-fw fa-plus"></i>
        </a>
    </div>
</div>

<div class="table-add-activity" id="tambah-jenis">
    <i class="fa fa-fw fa-plus"></i> Tambah Jenis Dokumen
</div>
