<header class="main-header header-style-three">

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container clearfix">

            <!--Info-->
            <div class="logo-outer">
                <div class="logo"><a href="{{ route('front_end/home') }}"><img src="{{ URL::asset('assets/front_end/images/paradise/paradise_white-removebg-preview.png') }}" alt="" title=""></a></div>
            </div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="navbar-header">
                        <!-- Togg le Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon flaticon-menu"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="current dropdown"><a href="{{ route('front_end/home') }}">الرئيسيه</a></li> 
                            <li><a class="dropdown" href="{{ route('front_end/about') }}">عن المكتبة</a></li>
                            <li><a class="dropdown" href="{{ route('front_end/blogs') }}">المدونه</a></li>
                            <li><a class="dropdown" href="{{ route('front_end/shop') }}">المتجر</a></li>
                            <li><a class="dropdown" href="{{ route('front_end/latest_books') }}">أحدث الكتب و العروض</a></li>
                            @if (!auth()->user())   
                                <li><a class="dropdown" href="{{ route('loginPage') }}">تسجيل الدخول</a></li>
                                <li><a class="dropdown" href="{{ route('registerFront_end') }}">تسجيل جديد</a></li>
                            @else
                                <li>
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>تسجيل خروج</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
                                </li>
                            @endif
                            
                            <li><a href="{{ route('show_cart') }}"><span class="badge badge-pill bg-danger border border-light rounded-circle">{{ Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span><span class="material-symbols-outlined mt-1">shopping_cart</span></a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->

                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    <!-- Main Menu End-->
                    <div class="nav-box">
                        <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
                    </div>

                    <!-- Social Box -->
                    <ul class="social-box clearfix">
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-google"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" class="img-responsive"><img src="{{ URL::asset('assets/front_end/images/paradise/image-140x50.png') }}" alt="" title=""></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon far fa-window-close"></span></div>

        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="{{ URL::asset('assets/front_end/images/paradise/image-140x50.png') }}" alt="" title=""></a></div>

            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
        </nav>
    </div><!-- End Mobile Menu -->

</header>