@extends('layouts.master')
@section('title')
قائمة المستودعات
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستودعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المستودعات</span>
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
									<h4 class="card-title mg-b-0">قائمة المستودعات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									@can('إضافة مستودع')
										<button class="btn btn-primary" data-target="#add_ware" data-toggle="modal">إضافه</button>
									@endcan
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم المستودعات</th>
												<th class="wd-20p border-bottom-0">الموقع</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $warehouses as $ware)
												<tr>
													<td>{{ $loop->index +1 }}</td>
													<td>{{ $ware->name }}</td>
													<td>{{ $ware->location }}</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																@can('تعديل مستودع')
																	<button class="dropdown-item" data-target="#edit_ware{{ $ware->id }}" data-toggle="modal" > <i class="fa fa-edit text-primary float-left"></i> تعديل </button>
																@endcan
																@can('حذف مستودع')
																	<button class="dropdown-item" data-target="#delete_ware{{ $ware->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
																@endcan
															</div>
														</div>
													</td>
												</tr>
												@include('warehouses.delete')
												@include('warehouses.edit')
											@endforeach
										</tbody>
									</table>
									@include('warehouses.add')
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