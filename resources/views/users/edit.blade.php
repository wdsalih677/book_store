@extends('layouts.master')
@section('title')
تعديل مستخدم
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل مستخدم</span>
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
									<h4 class="card-title mg-b-0">تعديل مستخدم</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
                                <div class="container">
                                    <form action="{{ route('users.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="row">
                                            <div class="col">
                                                <label class="text-primary">الإسم :</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                <br>
                                                <label class="text-primary">البريد الإلكتروني :</label>
                                                <input type="email" name="email" class="form-control" autocomplete="off" value="{{ $user->email }}">
                                            </div>
                                            <div class="col">
                                                <label class="text-primary">الحاله :</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>نشط</option>
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>غير نشط</option>
                                                </select>
                                                <br>
                                                <label class="text-primary">كلمة السر :</label>
                                                <input type="password" class="form-control" name="password" autocomplete="off">
                                            </div>
                                        </div>
                                        <br>
                                        <label class="text-primary">الصلاحيه :</label>
                                        <select name="role_name" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }} >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    <button type="submit" class="btn btn-primary" >تعديل المستخدم</button>
                                    </form>
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