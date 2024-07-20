@extends('layouts.master')
@section('title')
صلاحيات المستخدمين
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صلاحيات المستخدمين</span>
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
									<h4 class="card-title mg-b-0">قائمة المستخدمين</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									<button class="btn btn-primary" data-target="#add_roles" data-toggle="modal">إضافه صلاحيه</button>
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم الصلاحيه</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $roles as $role)
											<tr>	
												<td>{{ $loop->index +1 }}</td>
												<td>{{ $role->name }}</td>
												<td>
													<div class="dropdown">
														<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
														<div  class="dropdown-menu tx-13">
															<a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item"> <i class="fa fa-edit text-primary float-left"></i> تعديل </a>
															<button class="dropdown-item" data-target="#delete_role{{ $role->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
														</div>
													</div>
												</td>
											</tr>
											@include('roles.delete')
											@endforeach
										</tbody>
									</table>
									@include('roles.add')
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