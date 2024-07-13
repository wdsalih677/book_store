@extends('front_end.layouts.master')
@section('title')
المتجر
@endsection
@section('css')

@endsection
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>المتجر</h1>
        <div class="text">إقرأ ليزهر عقلك</div>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسيه </a></li>
            <li>المتجر</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

@livewire('front-end.shop')
@endsection
@section('js')
@endsection