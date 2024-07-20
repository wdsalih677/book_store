@extends('layouts.master')
@section('title')
تعديل صلاحيات المستخدمين
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل صلاحيات المستخدمين</span>
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
								<div class="container">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">تعديل صلاحيات المستخدمين</h4>
                                    </div>
                                </div>
							</div>
							<div class="card-body">
                                <div class="container">
                                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $role->id }}">
                                        <label class="text-primary">إسم الصلاحيه :</label>
                                        <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                                        <br>
                                        <label class="text-primary">الأذونات :</label>
                                        <div class="row">
                                            @foreach ($permissions as $permission )
                                                    <div class="col-md-3">
                                                        <input id="closeButton" type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="text-primary">{{ $permission->name }}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">تعديل صلاحيه</button>
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