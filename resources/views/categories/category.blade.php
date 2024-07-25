@extends('layouts.master')
@section('title')
قائمة الأقسام
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأقسام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الأقسام</span>
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
									<h4 class="card-title mg-b-0">قائمة الأقسام</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									@can('إضافة قسم')
										<button class="btn btn-primary" data-target="#add_cate" data-toggle="modal">إضافه</button>
									@endcan
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم القسم</th>
												<th class="wd-20p border-bottom-0">الوصف</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $categories as $cate)
												<tr>
													<td>{{ $loop->index +1 }}</td>
													<td>{{ $cate->name }}</td>
													<td>{{ $cate->description }}</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																@can('تعديل قسم')
																	<button class="dropdown-item" data-target="#edit_cate{{ $cate->id }}" data-toggle="modal" > <i class="fa fa-edit text-primary float-left"></i> تعديل </button>
																@endcan
																@can('حذف قسم')
																	<button class="dropdown-item" data-target="#delete_cate{{ $cate->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
																@endcan
															</div>
														</div>
													</td>
												</tr>
												@include('categories.delete')
												@include('categories.edit')
											@endforeach
										</tbody>
									</table>
									{{-- <div class="row">
										<div class="col-md-12">
											{{ $categories->links('pagination::bootstrap-4') }}
										</div>
									</div>   --}}
									@include('categories.add')
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