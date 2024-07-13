@extends('front_end.layouts.master')
@section('title')
تفاصيل المدونه
@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>الجديد في مكتبة برادايس</h1>
        <h3 class="text-white">ماذا نقدم لكم؟</h3>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسية </a></li>
            <li><a href="#">تفاصيل المدونه</a></li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="news-detail">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('storage/'. $blog_detail->title .'/'.$blog_detail->image) }}" alt="" />
                        </div>
                        <div class="lower-content">
                            <div class="content">
                                <ul class="post-meta">
                                    <li>{{ $blog_detail->created_at }}</li>
                                    <li>{{ $blog_detail->users->name }} : الناشر </li>
                                </ul>
                                <h3>{{ $blog_detail->title }}</h3>
                                <div class="text">
                                    <p>{{ $blog_detail->blog_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection