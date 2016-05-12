@extends('./layout')

@section('costom_style_pages')
    <link rel="stylesheet" href="{{url('asset/plugins/iCheck/all.css')}}">
@stop


@section('content_main_pages')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">List Module</h3>
        </div>
        <div class="box-body">
            @foreach($role as $role_user)
            <div class="col-md-9 box box-default">
                <div class="box-header with-border" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                    <h4 class="box-title">{{$role_user->nama_role}}</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{url('hrga/update-module')}}" method="get">
                        {!! csrf_field() !!}
                        <input type="hidden" name="role_user" value="{{$role_user->id}}">
                        <table class="table table-bordered">
                            <tbody>
                            <?php $sum_module = count($module); $i=0; ?>

                            @foreach($module->chunk(3) as $chunk)
                                <tr>
                                    @foreach($chunk as $module_app)
                                        <td width="25%">                  <!-- checkbox -->
                                            <label>
                                                <input type="checkbox" name="x_{{$module_app->id}}" class="flat-red" value="true" @if($role_user->has_module($module_app->id))checked <?php $i++; ?> @endif>
                                                {{$module_app->nama_module}}
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            <tr>
                                <td width="25%">                  <!-- checkbox -->
                                    <label>

                                        <input type="checkbox" name="semua_module" class="flat-red" @if($i == $sum_module) checked @endif value="true">
                                        Pilih Semua
                                    </label>
                                </td>
                                <td colspan="2"><input type="submit" value="Save" class="btn btn-warning col-md-3 pull-right"></td>
                            </tr>
                            </tbody>

                        </table>
                    </form>

                </div>
            </div>
            @endforeach

        </div>
        <div class="box-footer">
        </div><!-- /.box-footer -->
    </div>
@stop

@section('costom_js_pages')
    <!-- iCheck 1.0.1 -->
    <script src="{{url('asset/plugins/iCheck/icheck.min.js')}}"></script>
    <script>

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
@stop