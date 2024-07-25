@extends('front_end.layouts.master')
@section('title')
عربة التسوق
@endsection
@section('css')

@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>عربة التسوق</h1>
        <div class="text">إقرأ ليزهر عقلك</div>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسيه </a></li>
            <li>عربة التسوق</li>
        </ul>
    </div>
</section>
<!--End Page Title-->
<!-- cart Page Section -->
<section class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            @if (empty($cart))
                <div class="alert alert-danger" role="alert">
                    عربة التسوق فارغه
                </div>
            @else
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="table-primary">
                        <th >العمليات</th>
                        <th >الكميه</th>
                        <th >السعر</th>
                        <th >إسم الكتاب</th>
                        <th >#</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $cart as $x )
                            <tr>
                                <td></td>
                                <td>{{ $x->qty }}</td>
                                <td>{{ $x->price }}</td>
                                <td>{{ $x->name }}</td>
                                <td>{{ $loop->index +1 }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</td>
                            <td></td>
                            <td>المجموع</td>
                        </tr>
                    </tbody>
                </table> 
            @endif
        </div>
    </div>
</section>
<!-- End Portfolio Page Section -->
@endsection
@section('js')
@endsection