<tr>
    <td>Lokator</td>
    <td class="tebal">{{$dokumen->locator}}</td>
</tr>
<tr>
    <td>Action</td>
    <td class="tebal"><a href="{{url('dokumen/edit')}}/{{$dokumen->id}}" class="btn btn-warning btn-xs">Edit</a>
        <a href="{{url('dokumen/delete')}}/{{$dokumen->id}}" class="btn btn-danger btn-xs">Delete</a>
        @if($dokumen->status_dokumen_id === 2)
            <a href="{{url('dokumen/verify')."/"."$dokumen->id"}}" class="btn btn-info btn-xs">Verify </a>
        @endif
    </td>
</tr>