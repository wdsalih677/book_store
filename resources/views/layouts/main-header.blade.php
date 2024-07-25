<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								@if (!empty(auth()->user()->photo))	
									<a class="profile-user d-flex" href=""><img alt="" src="{{ asset('storage/'. auth()->user()->name .'/'.auth()->user()->photo) }}"></a>
								@else
									<a class="profile-user d-flex" href=""><img alt="" src="{{ asset('assets\front_end\images\profile-user.jpg') }}"></a>
								@endif
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											@if (!empty(auth()->user()->photo))	
												<div class="main-img-user"><img alt="" src="{{ asset('storage/'. auth()->user()->name .'/'.auth()->user()->photo) }}" class=""></div>
											@else
												<div class="main-img-user"><img alt="" src="{{ asset('assets\front_end\images\profile-user.jpg') }}" class=""></div>
											@endif
											<div class="mr-3 my-auto">
												<h6>{{ auth()->user()->name }}</h6><span>{{ auth()->user()->email }}</span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href="{{ route('user_profile', auth()->user()->id ) }}"><i class="bx bx-user-circle"></i>الملف الشخصي</a>
									@if (auth()->user()->role_name === ["admin"])
										<a class="dropdown-item" href="{{ route('front_end/home') }}"><i class="bx bx-cog"></i>إنتقال للموقع</a>
									@endif
									<a class="dropdown-item"  href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>تسجيل خروج</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</div>
							{{-- <div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								</a>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
