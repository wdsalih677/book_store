<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>

@include('front_end.layouts.head')
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
@yield('css')
</head>

<body>

<div class="page-wrapper rtl">
    <!-- Preloader -->
    <div class="preloader"></div>

    @include('front_end.layouts.header')
    <!-- End Main Header -->

    @yield('content')
	@include('sweetalert::alert')
	<!--Main Footer-->
    @include('front_end.layouts.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="post" action="index.html">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                        <input type="submit" value="Search Now!" class="theme-btn">
                    </fieldset>
                </div>
            </form>

            <br>
            <h3>Recent Search Keywords</h3>
            <ul class="recent-searches">
                <li><a href="#">Business</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">SEO</a></li>
                <li><a href="#">Logistics</a></li>
                <li><a href="#">Freedom</a></li>
            </ul>

        </div>

    </div>
</div>

<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group">
	<div class="xs-overlay xs-bg-black"></div>
	<div class="xs-sidebar-widget">
		<div class="sidebar-widget-container">
			<div class="widget-heading">
				<a href="#" class="close-side-widget">
					X
				</a>
			</div>
			<div class="sidebar-textwidget">

				<!-- Sidebar Info Content -->
            <div class="sidebar-info-contents">
				<div class="content-inner">
					<div class="logo">
						<a href="index.html"><img src="{{ URL::asset('assets/front_end/images/paradise/paradise_white-removebg-preview.png') }}" alt="" /></a>
					</div>
					<div class="content-box">
						<h2>مكتبة برادايس</h2>
						<p class="text">إقرأ ليزهر عقلك</p>
					</div>
					<div class="contact-info">
						<h2>معلومات التواصل</h2>
						<ul class="list-style-two">
							<li><span class="icon flaticon-map"></span>السودان - ولاية نهر النيل - مدينة عطبرة - سوق عطبرة - شارع السلك جوار البنك الفرنسي</li>
							<li><span class="icon flaticon-telephone"></span>+249 121 662 696</li>
							<li><span class="icon flaticon-message-1"></span>paradise@mahasoft.net</li>
							<li><span class="icon flaticon-timetable"></span>متوفر يوميا من 09:00 ص إلي 05:00م عدا يوم الجمعه</li>
						</ul>
					</div>
					<!-- Social Box -->
					<ul class="social-box">
						<li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
						<li class="twitter"><a href="#" class="fab fa-twitter"></a></li>
						<li class="linkedin"><a href="#" class="fab fa-linkedin-in"></a></li>
						<li class="instagram"><a href="#" class="fab fa-instagram"></a></li>
						<li class="youtube"><a href="#" class="fab fa-youtube"></a></li>
					</ul>
				</div>
			</div>

			</div>
		</div>
	</div>
</div>
<!-- END sidebar widget item -->

<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="fas fa-cog"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Color</h6>
    </div>
    <div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
            <span class="palate green-color" data-theme-file="css/color-themes/green-theme.css"></span>
            <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
            <span class="palate orange-color" data-theme-file="css/color-themes/orange-theme.css"></span>
            <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
            <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
            <span class="palate brown-color" data-theme-file="css/color-themes/brown-theme.css"></span>
            <span class="palate redd-color" data-theme-file="css/color-themes/redd-color.css"></span>
        </div>
    </div>

	<ul class="rtl-version option-box"> <li class="rtl">RTL Version</li> <li>LTR Version</li> </ul>

    <a href="#" class="purchase-btn">Purchase now $17</a>

    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>

</div>

<!--Scroll to top-->
@include('front_end.layouts.footer_script')
@yield('js')
</body>
</html>
