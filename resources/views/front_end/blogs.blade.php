@extends('front_end.layouts.master')
@section('title')
المدونه
@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>الجديد في مكتبة برادايس</h1>
        <h3 class="text-white">ماذا نقدم لكم؟</h3>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسية </a></li>
            <li><a href="#">المدونة</a></li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!-- Blog Page Section -->
<section class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">

            @foreach ( $blogs as $blog )
            <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="blog-detail.html"><img src="{{ asset('storage/'. $blog->title .'/'.$blog->image) }}" alt="" /></a>
                    </div>
                    <div class="lower-content">
                        <div class="content">
                            <ul class="post-meta">
                                <li>{{ $blog->created_at }}</li>
                                <li>{{ $blog->users->name }} : الناشر</li>
                            </ul>
                            <br><br>
                            <h2 class="text-white">{{ $blog->title }}</h2>
                            <br><br>
                            <a href="{{ route('front_end/blog_detail', $blog->id) }}" class="theme-btn btn-style-five"><span class="txt">عرض المدونة</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Portfolio Page Section -->
@endsection