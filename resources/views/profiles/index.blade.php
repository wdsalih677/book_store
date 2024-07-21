@extends('layouts.master')
@section('title')
الملف الشخصي - {{ auth()->user()->name }}
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الملف الشخصي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ auth()->user()->name }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{ asset('storage/'. auth()->user()->name .'/'.auth()->user()->photo) }}">
										</div>
                                        @include('profiles.update_photo')
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{ auth()->user()->name }}</h5>
											</div>
										</div>
                                        <hr>
										<h6>السيره الزاتيه</h6>
										<div class="main-profile-bio">
											{{ auth()->user()->bio }}
										</div>
										<hr>
										<div class="m-t-30">
											<h4 class="tx-15 text-uppercase mt-3">المعلومات الشخصيه</h4>
											<div class=" p-t-10">
												<h5 class="text-primary m-b-5 tx-14">الإسم : {{ auth()->user()->name }}</h5>
												<p class="text-primary m-b-5 tx-14">البريد الإلكتروني : {{ auth()->user()->email }}</p>
												<p class="text-primary m-b-5 tx-14"> رقم الهاتف : {{ auth()->user()->phone_number }}</p>
												<p class="text-primary m-b-5 tx-14"> العنوان : {{ auth()->user()->address }}</p>
											</div>
										</div><!-- main-profile-bio -->
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">مواقع التواصل الإجتماعي</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-facebook"></i>
												</div>
												<div class="media-body">
													<span>فيسبوك</span> <a href="{{ auth()->user()->facebook_link }}">{{ auth()->user()->facebook_link }}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>تويتر</span> <a href="{{ auth()->user()->twitter_link }}">{{ auth()->user()->twitter_link }}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>Linkedin</span> <a href="{{ auth()->user()->linkedin_link }}">{{ auth()->user()->linkedin_link }}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>موقعنا</span> <a href="{{ auth()->user()->linkedin_link }}">{{ auth()->user()->linkedin_link }}</a>
												</div>
											</div>
										</div>
									</div>
                                    <!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">الطلبات</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-paypal text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Revenue</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Product sold</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">الإعدادات</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="settings">
										<form action="{{ route('update_user' , auth()->user()->id ) }}" method="POST" enctype="multipart/form-data">
											@csrf
											@method('POST')
											<input type="hidden" name="id" value="{{ auth()->user()->id }}">
											<div class="row">
												<div class="col">
													<div class="form-group">
														<label for="FullName">الإسم</label>
														<input type="text" value="{{  auth()->user()->name }}" name="name" class="form-control">
													</div>
													<div class="form-group">
														<label for="Password">كلمة السر</label>
														<input type="password" name="password" placeholder="يجب كتابة كلمة السر"  class="form-control">
													</div>
													<div class="form-group">
														<label for="address">العنوان</label>
														<input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control">
													</div>
													<div class="form-group">
														<label for="Password">تويتر</label>
														<input type="text" name="twitter_link" value="{{ auth()->user()->twitter_link }}"  class="form-control">
													</div>
													<div class="form-group">
														<label for="web_link">موقعك</label>
														<input type="text" name="web_link" value="{{ auth()->user()->web_link }}" class="form-control">
													</div>
												</div>
												<div class="col">
													<div class="form-group">
														<label for="Email">البريد الإلكتروني</label>
														<input type="email" value=" {{ auth()->user()->email }}" name="email" class="form-control">
													</div>
													<div class="form-group">
														<label for="phone_number">رقم الهاتف</label>
														<input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}" class="form-control">
													</div>
													<div class="form-group">
														<label for="Email">فيسبوك</label>
														<input type="text" value=" {{ auth()->user()->facebook_link }}" name="facebook_link" class="form-control">
													</div>
													<div class="form-group">
														<label for="phone_number">LinkedIn</label>
														<input type="text" name="linkedin_link" value="{{ auth()->user()->linkedin_link }}" class="form-control">
													</div>
													<div class="form-group">
														<label for="photo">صورة الملف الشخصي</label>
														<input type="file" name="photo" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="bio">السيره الزاتيه</label>
												<textarea name="bio" class="form-control">{{ auth()->user()->bio }}</textarea>
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">حفظ</button>
										</form>
									</div>
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