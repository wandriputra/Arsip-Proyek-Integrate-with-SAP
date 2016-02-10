@extends('./layout')

@section('content_main_pages')
<!-- SELECT2 EXAMPLE -->
		<div class="nav-tabs-custom">            
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> </a></li>
				<li><a href="#"></a></li>
				<li class="active"></li>
			</ol>
            <ul class="nav nav-tabs">
				<li class="active"><a href="#detail_file" data-toggle="tab">Detail</a></li>
				<li><a href="#dokumen_terkait" data-toggle="tab">Dokumen Terkait</a></li>
            </ul>
            <div class="tab-content">

				<div class="active tab-pane" id="detail_file">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.tab-pane -->

				<div class="tab-pane" id="dokumen_terkait">
					<div class="row">
					

					</div><!-- /.row -->
				</div>
			</div>
		</div>
@stop