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
            <td class="hide jenis_dokumen_id">{{$val['sub_jenis_dok']['id']}}</td>
            <td>
                @unless($data['has_dokumen']->count())
                    <a class="btn btn-xs btn-success show-modal" href="{{url('dokumen/modal-upload').'?actifity='.$val['actifity']['id'].'&jenis='.$val['sub_jenis_dok']['id'].'&checklist='.$val['checklist']['id'].'&unit='.$val['checklist']['unit']['id']}}"><i class="fa fa-plus"></i> Dokumen</a>
                @endunless
            </td>
        </tr>
    @endforeach
</table>