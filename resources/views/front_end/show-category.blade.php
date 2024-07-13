@extends('front_end.layouts.master')
@section('title')
{{ $category->name }}
@endsection
@section('content')
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/7.jpg);">
        <div class="auto-container">
            <h1>{{ $category->name }}</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{ route('front_end/home') }}"><span class="fas fa-home"></span> الرئيسيه </a></li>
				<li>{{ $category->name }}</li>
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
                        <!--Shop Item-->
                        @forelse  ( $books as $book )
						<div class="product-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="{{ asset('storage/'. $book->title .'/'.$book->image) }}" alt="" />
									<ul class="options clearfix">
                                        <li><a href="{{ route('front_end/add_to_cart',$book->id) }}">إضافه للعربه</a></li>
                                        <li><a href="{{ route('front_end/add_to_cart',$book->id) }}"><span class="icon flaticon-shopping-cart"></span></a></li>
                                    </ul>
								</div>
								<div class="lower-box">
                                    <div class="content">
                                        <h3><a href="{{ route('front_end/shop_detail',$book->id) }}">{{ $book->title }}</a></h3>
                                        <div class="price">SDG {{ $book->price }}</div>
									</div>
								</div>
							</div>
						</div>
                        @empty
                        <div class="row text-center" style="width: 100%">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    لا توجد كتب في هذا القسم
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            {{ $books->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <div class="sidebar-title">
                                <h3>إبحث عن كتابك</h3>
                            </div>
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" id="live_search" placeholder="بحث عن كتاب أو كاتب">
                                    <br>
                                    <ul class="list-group text-center" id="search-results"></ul>
                                </div>
                            </form>
                        </div>

                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title">
                                <h3>الأقسام</h3>
                            </div>
                            <ul class="archive-list">
                                @foreach ( $cate as $x )
                                    <li>
                                        <a href="{{ route('front_end/show_category', $x->id) }}" class="clearfix">
                                            <span class="pull-right">{{ $x->name }}</span>
                                            <span class="pull-left">( {{ $x->books->count() }} )</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sierbar Container -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#live_search').on('input', function () {
            let query = $(this).val().trim();

            if (query.length >= 1) {
                $.ajax({
                    url: '/live_search/{{ $category->id }}',
                    type: 'GET',
                    data: { query: query },
                    success: function (response) {
                        displayResults(response);
                    },
                    error: function () {
                        console.error('Error in live search request.');
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
        // <li class="list-group-item"></li>
        function displayResults(results) {
            let $resultsContainer = $('#search-results');
            $resultsContainer.empty();

            if (results.length > 0) {
                $.each(results, function (live_search, book) {
                    let route = "{{ route('front_end/shop_detail', ['id' => ':id']) }}";
                    route = route.replace(':id', book.id);

                    $resultsContainer.append('<a href="' + route + '"><li class="list-group-item">' + book.title + '</li></a>');
                });
            } else {
                $resultsContainer.append('<li>No results found</li>');
            }
        }
    });
</script>
@endsection