@extends('front_end.layouts.master')
@section('title')
عن مكتبة برادايس
@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
	<div class="auto-container">
		<h1>عن المكتبة</h1>
		<div class="text">ما هي الخدمات اتي تقدمها المكتبة؟</div>
		<ul class="bread-crumb clearfix">
			<li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسية </a></li>
			<li><a href="#">عن المكتبة</a></li>
		</ul>
	</div>
</section>
<!--End Page Title-->

<!-- Services Section -->
<section class="services-section">
	<div class="auto-container">

		<!-- Sec Title -->
		<div class="sec-title centered">
			<h2>الخدمات التي تقدمها مكتبة برادايس</h2>
			<div class="separator"></div>
		</div>

		<div class="row clearfix">

			<!-- Left Column -->
			<div class="left-column pull-left col-lg-4 col-md-12 col-sm-12">
				<div class="inner-column">

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">متكبة متكامله</a></h3>
							<div class="text">تقدم برادايس أفضل مكتبة متكامله</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">قراءة صامته</a></h3>
							<div class="text">من إجل راحة عملائنا توفر برادايس أفضل مكان للقراءة الصامته</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">نادي مناقشة</a></h3>
							<div class="text">يُعتبر نادي برادايس للكتاب طريقة رائعة لمقابلة عشاق القراءة  في أجواء ممتعة وجذابة، ومناقشة مجموعة متنوعة من الكتب  حيث يناقش القراء كتاباً جديداً في كل اجتماع، ويتبادلون أفكارهم حوله، ويستكشفون عالم القراءة من منظور جديد.</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Circles Column -->
			<div class="circles-column col-lg-4 col-md-12 col-sm-12">
				<div class="inner-column">

					<div class="circles">
						<div class="circle-one"></div>
						<div class="circle-two"></div>
						<div class="circle-three"></div>
					</div>

				</div>
			</div>

			<!-- Right Column -->
			<div class="right-column pull-right col-lg-4 col-md-12 col-sm-12">
				<div class="inner-column">

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">مقهى</a></h3>
							<div class="text">المكان الذي يقدم أفضل أنواع المشروبات الساخنة والباردة  واستمتع بخصوماتنا الخاصة</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">تغليف كتب</a></h3>
							<div class="text">تغليف الكتب و الهدايا بطريقه جدا رائعه</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block">
						<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
							<h3><a href="doctors-detail.html">خدمة التوصيل</a></h3>
							<div class="text">اطلب الآن واحصل على توصيل سريع وموثوق به و استمتع بالتسوق من المنزل وتوصيل الطلبات إلى باب بيتك</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
</section>

@endsection

