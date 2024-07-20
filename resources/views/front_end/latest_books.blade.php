@extends('front_end.layouts.master')
@section('title')
أحدث الكتب و العروض
@endsection
@section('css')

@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>أحدث الكتب و العروض</h1>
        <div class="text">إقرأ ليزهر عقلك</div>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسيه </a></li>
            <li>أحدث الكتب و العروض</li>
        </ul>
    </div>
</section>
<!--End Page Title-->
<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <div class="row clearfix">
                    @foreach ( $latestBooks as $book )
                    <div class="product-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('storage/'. $book->books->title .'/'.$book->books->image) }}" alt="" />
                                <ul class="options clearfix">
                                    <li><a href="{{ route('front_end/add_to_cart',$book->books->id) }}">إضافه للعربه</a></li>
                                    <li><a href="{{ route('front_end/add_to_cart',$book->books->id) }}"><span class="icon flaticon-shopping-cart"></span></a></li>
                                </ul>
                            </div>
                            <div class="lower-box">
                                <div class="content">
                                    <h3><a href="{{ route('front_end/shop_detail',$book->books->id) }}">{{ $book->books->title }}</a></h3>
                                    <div class="price">SDG {{ $book->offer_price }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $latestBooks->links('pagination::bootstrap-4') }}
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- End Sierbar Container -->
@endsection
@section('js')
@endsection