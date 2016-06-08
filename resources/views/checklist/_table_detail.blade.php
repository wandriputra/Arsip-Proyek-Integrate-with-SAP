<table class="table-checklist" border="1">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Aktifitas</th>
        <th class="text-center">Jenis Dokumen</th>
        <th class="text-center">Dokumen</th>
    </tr>
    <?php $i=1; $j=1;?>
    @foreach($list as $val)
        <tr>
            @if($j > $act[$val['actifity']['nama_actifity']]['rowspan'])
                <?php $j=1; ?>
            @endif

            @if($j==1)
                <td rowspan="{{$act[$val['actifity']['nama_actifity']]['rowspan']}}">{{$i++}}</td>
                <td rowspan="{{$act[$val['actifity']['nama_actifity']]['rowspan']}}">{{$val['actifity']['nama_actifity']}}</td>
            @endif
            <?php $j++ ?>
            <td>{{$val['sub_jenis_dok']['nama_sub']}}</td>
            <td>
                @if($data['has_dokumen']->count() > 0)
                    <a href="" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Dokumen</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>