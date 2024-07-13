@extends('front_end.layouts.master')
@section('title')
تفاصيل الكتاب
@endsection
@section('content')
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/7.jpg);">
        <div class="auto-container">
            <h1>تفاصيل الكتاب</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسية </a></li>
				<li>تفاصيل الكتاب</li>
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
                    <div class="shop-single">
                        <div class="product-details">

                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                        <figure class="image-box">
                                            <a href="images/resource/products/10.jpg" class="lightbox-image" title="{{ $book->title }}"><img src="{{ asset('storage/'. $book->title .'/'.$book->image) }}" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="info-column col-lg-6 col-md-12 col-sm-12">
                                        <div class="details-header">
                                            <h4>{{ $book->title }}</h4>
                                            <a  href="#">القسم : {{ $book->categories->name }}</a>
                                            <div class="item-price">SDG السعر : {{ $book->price }}</div>
                                        </div>

                                        <div class="text">{{ $book->description }}</div>
                                        <div class="other-options clearfix">
                                            <a href="{{ route('front_end/add_to_cart', $book->id) }}" class="theme-btn btn-style-one add-to-cart float-left"><span class="txt">Add To Cart</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!-- End Sierbar Container -->
@endsection