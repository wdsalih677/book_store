@extends('front_end.layouts.master')
@section('title')
مكتبة برادايس | Paradise Book-Store
@endsection
@section('content')
<!-- Main Slider Three -->
<section class="main-slider-three">
    <div class="banner-carousel">
        <!-- Swiper -->
        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>مكتبة برادايس  Paradise Book-store</h2>
                                <br>
                                <h3 class="text-white">مكتبة...مساحه للحلم</h3>
                                <div class="btn-box">
                                    <a href="{{ route('front_end/about') }}" class="theme-btn appointment-btn">عن المكتبة</a>
                                    <a href="{{ route('front_end/shop') }}" class="theme-btn services-btn">المتجر</a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('assets/front_end/images/paradise/slider3.png') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>إقرأ ليزهر عقلك</h2>
                                <div class="text">أعظم وصف للعزله هو ما قاله كارلوس زافون قائلا: لم يحبنا العالم و لم يسعنا و وسعتنا أرفف مكتبتنا و حيز غرفنا الضيق</div>
                                <div class="btn-box">
                                    <a href="{{ route('front_end/about') }}" class="theme-btn appointment-btn">عن المكتبة</a>
                                    <a href="{{ route('front_end/shop') }}" class="theme-btn services-btn">المتجر</a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('assets/front_end/images/paradise/slider1.png') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="swiper-slide slide">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>أجمل العروض في مكتبة برادايس</h2>
                                <div class="text">من لا يقرأ يعيش حياة واحدة حتى لو إجتاز السبعين أما من يقرأ يعيش خمسة آلاف عام..القراءة أبدية أزلية   </div>
                                <div class="btn-box">
                                    <a href="{{ route('front_end/about') }}" class="theme-btn appointment-btn">عن المكتبة</a>
                                    <a href="{{ route('front_end/shop') }}" class="theme-btn services-btn">المتجر</a>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ URL::asset('assets/front_end/images/paradise/slider2.png') }}" alt="" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- End Main Slider -->

<!-- Health Section -->
<section class="health-section">
    <div class="auto-container">
        <div class="inner-container">

            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="border-line"></div>
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>مكتبة برادايس<br> من نحن؟</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">
                            مرحبًا بك في برادايس ، حيث يتم تشجيع على القراءة وتوسيع آفاق المعرفة. نحن نسعى لتوفير بيئة هادئة وملهمة للقراءة، حيث يمكن للزوار الاستمتاع بمجموعة واسعة من الكتب في مختلف المجالات. تتيح لك برادايس الفرصة لتعزيز حب القراءة وتعزيز التواصل الثقافي، مما يجعلها وجهة مثالية لأولئك الذين يسعون لاكتساب المعرفة والتمتع بتجربة القراءة الفريدة</div>
                        <a href="{{ route('front_end/about') }}" class="theme-btn btn-style-one"><span class="txt">عن المكتبة</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ URL::asset('assets/front_end/images/paradise/about.png') }}" alt="" />
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Health Section -->

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>فريق العمل</h2>
            <div class="separator"></div>
        </div>

        <div class="row clearfix justify-content-center">
            <!-- Team Block -->
            <div class="team-block col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <img src="{{ URL::asset('assets/front_end/images/resource/dalito.jpg') }}" alt="" />
                        <div class="overlay-box">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/dalito.salah"><span class="fab fa-facebook-f"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="#">داليا صلاح ميرغني</a></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Team Section -->

<!-- Testimonial Section Two -->
<section class="testimonial-section-two">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>إقتباسات</h2>
            <div class="separator"></div>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">

            <!-- Tesimonial Block Two -->
            <div class="testimonial-block-two">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ URL::asset('assets/front_end/images/resource/altaybsalih1.jpg') }}" alt="" />
                    </div>
                    <div class="text">“نُعلِّمُ الناس لنفتح أذهانهم ولنطلق طاقاتهم المحبوسة، ولكننا لا نستطيع أن نتنبأ بالنتيجة، ونحرر العقول من الخرافات، ونعطي الشعب مفاتيح المستقبل ليتصرف فيه كما يشاء”</div>
                    <br><div class="lower-box">
                        <div class="clearfix">

                            <div class="pull-left">
                                <div class="quote-icon flaticon-quote"></div>
                            </div>
                            <div class="pull-right">
                                <div class="author-info">
                                    <h3>الطيب صالح</h3>
                                    <div class="author">موسم الهجرة للشمال</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Tesimonial Block Two -->
            <div class="testimonial-block-two">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ URL::asset('assets/front_end/images/resource/altaybsalih2.jpg') }}" alt="" />
                    </div>
                    <div class="text">“إنني أريد أن آخذ حقي من الحياة عنوة.أريد أن أعطي بسخاء، أريد أن يفيض الحب من قلبي فينبع ويثمر.ثمة آفاق كثيرة لابد أن تزار، ثمة ثمار يجب أن تقطف، كتب كثيرة تقرأ، وصفحات بيضاء في سجل العمر، سأكتب فيها جملاً واضحة بخط جريء.”</div>
                    <div class="lower-box">
                        <div class="clearfix">

                            <div class="pull-left">
                                <div class="quote-icon flaticon-quote"></div>
                            </div>
                            <div class="pull-right">
                                <div class="author-info">
                                    <h3>الطيب صالح</h3>
                                    <div class="author">موسم الهجرة للشمال</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section Two -->

@endsection