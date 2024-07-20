@extends('layouts.master')
@section('title')
قائمة المستخدمين
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المستخدمين</span>
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
									@can('إضافة مستخدم')
										<button class="btn btn-primary" data-target="#add_user" data-toggle="modal">إضافه مستخدم</button>
									@endcan
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم المستخدم</th>
												<th class="wd-20p border-bottom-0">البريد الإلكتروني</th>
												<th class="wd-20p border-bottom-0">الصلاحيه</th>
												<th class="wd-20p border-bottom-0">الحاله</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $users as $user)
											<tr>	
												<td>{{ $loop->index +1 }}</td>
												<td>{{ $user->name }}</td>
												<td>{{ $user->email }}</td>
												<td>
													@foreach ( $user->getRoleNames() as $x )
														{{ $x }}
													@endforeach
												</td>
												<td>
													@if ($user->status == 1)
														<p class="badge bg-success" style="color: white;">نشط</p>
													@else
														<p class="badge bg-danger" style="color: white;">غير نشط</p>
													@endif
												</td>
												<td>
													<div class="dropdown">
														<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
														<div  class="dropdown-menu tx-13">
															@can('تعديل مستخدم')
																<a href="{{ route('users.edit', $user->id) }}" class="dropdown-item" > <i class="fa fa-edit text-primary float-left"></i> تعديل </a>
															@endcan
															@can('حذف مستخدم')
																<button class="dropdown-item" data-target="#delete_user{{ $user->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
															@endcan
														</div>
													</div>
												</td>
											</tr>
											@include('users.delete')
											@endforeach
										</tbody>
									</table>
									@include('users.add')
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