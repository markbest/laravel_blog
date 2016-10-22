@extends('app')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <h3 class="admin-page-header"><i class="fa fa-home fa-fw"></i>分类管理 / {{ $category->title }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
		<div class="admin-panel-body">
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
		  
		    <form action="{{ URL('admin/category/'.$category->id) }}" method="POST">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label>标题：</label>
					<input type="text" name="title" class="form-control" required="required" value="{{ $category->title }}">
				</div>  
				<button class="admin-btn btn btn-success">提交分类</button>
            </form>
		</div>
	</div>
</div>
@endsection