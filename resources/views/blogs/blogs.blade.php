@extends('layouts.master')
@section('title')
قائمة المدونات
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المدونات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المدونات</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">قائمة المدونات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									<button class="btn btn-primary" data-target="#add_blog" data-toggle="modal">إضافة مدونه جديد</button>
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">عنوان المدونه</th>
												<th class="wd-20p border-bottom-0">نشر بواسطة</th>
												<th class="wd-20p border-bottom-0">التاريخ و الوقت</th>
												<th class="wd-20p border-bottom-0">إظهار المدونه</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $blogs as $blog )
												<tr>
													<td>{{ $loop->index +1 }}</td>
													<td>{{ $blog->title }}</td>
													<td>{{ $blog->users->name }}</td>
													<td>{{ $blog->created_at }}</td>
													<td>
														<div class="form-check form-switch">
															<input type="checkbox" data-toggle="switchbutton" checked data-size="xs">
														</div>														  
													</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																<button class="dropdown-item" data-target="#edit_blog{{ $blog->id }}" data-toggle="modal" > <i class="fa fa-edit text-primary float-left"></i> تعديل </button>
																<button class="dropdown-item" data-target="#delete_blog{{ $blog->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
															</div>
														</div>
													</td>
												</tr>
												@include('blogs.delete')
												@include('blogs.edit')
											@endforeach
										</tbody>
									</table>
									@include('blogs.add')
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection