@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/select2/select2.min.css')}}">
    <style>
        .detail-kode{
            margin-top: 10px;
            font-style: italic;
            font-weight: 400;
        }
        .table-add-activity{
            text-align: center;
            width: 100%;
            padding: 10px;
            border-radius: 3px;
        }
        .table-add-activity:hover{
            background-color: #eee;
        }
         td, th {
             padding: 10px;
             border: 1px solid #f4f4f4;

         }
        .table-checklist{
            width:100%;
            margin-bottom: 30px;
        }
        .judul-checklist{
            padding:5px;
        }
    </style>
@stop

@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Checklist Baru</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-horizontal" action="{{url('checklist/edit')}}">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nama Checklist</label>
                    <div class="col-md-8">
                        <input type="text" name="nama_checklist" class="form-control kode" disabled value="{{$data['nama_checklist']}}">
                    </div>
                    <label class="detail-kode"> </label>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Unit</label>
                    <div class="col-md-8">
                        <input type="text" name="nama_unit" class="form-control kode" disabled value="{{$data['unit']['nama_unit']}}">
                    </div>
                </div>

                <hr>
                @include('checklist._table_detail')
                <hr>
                <input type="hidden" name="checklist_id" value="{{$data['id']}}">
                <input type="hidden" name="unit_id" value="{{$data['unit_id']}}" id="asal_surat">

                @include('checklist._add_actifity_jenis')

        </div>
        <div class="box-footer">
            <div class="">
                <button type="reset" class="btn btn-default col-md-2">List</button>
                <button type="submit" class="btn btn-info col-md-2 pull-right">Tambah</button>
            </div>
        </div><!-- /.box-footer -->
        </form>
    </div>
@stop

@section('costom_js_pages')
    @include('checklist._Script')
@stop