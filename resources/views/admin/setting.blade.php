@extends('app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="admin-page-header"><i class="fa fa-home fa-fw"></i>基础设置</div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
		<div class="row">
			<div class="col-sm-8">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					 </div>
				@endif
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">网站设置</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
							<div class="panel-body">
								<div class="admin-panel-body">
									<form action="{{ url('admin/setting')}}" method="POST">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										@foreach($configs as $config)
											<div class="form-group">
												<label>{{ $config->name }}：</label>
												<input type="text" name="config[{{ $config->path }}]" class="form-control" required="required" value="{{ $config->value }}">
											</div>  
										@endforeach
										<button type="submit" class="admin-btn btn btn-success">保存设置</button>
										<button type="button" class="admin-btn btn btn-primary" data-toggle="modal" data-target="#add_setting">新增设置</button>
									</form>
								</div>
							</div>
							
                            <div class="modal fade" id="add_setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">新增设置</h4>
                                        </div>
										<form action="{{ url('admin/setting')}}" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<div class="modal-body">
												<div class="form-group">
													<label>名称：</label>
													<input type="text" name="name" class="form-control" required="required" value="">
												</div> 
												<div class="form-group">
													<label>编码：</label>
													<input type="text" name="path" class="form-control" required="required" value="">
												</div>  
												<div class="form-group">
													<label>值：</label>
													<input type="text" name="value" class="form-control" required="required" value="">
												</div>  												
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
												<button type="submit" class="btn btn-primary">保存</button>
											</div>
										</form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
                </div>
			</div>
		</div>
    </div>
</div>
@endsection