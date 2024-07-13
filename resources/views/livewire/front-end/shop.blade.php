<div>
    <!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <div class="row clearfix">
                    <!--Shop Item-->
                    {{-- @if(!empty($category)) --}}
                    {{-- @php
                        if ($category != []) {
                            $data = $category;
                        }else{
                            $data = $categories;
                        }
                    @endphp --}}
                    {{-- @forelse ( $data as $book ) --}}
                    @foreach ( $books as $book )
                        
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
                    @endforeach
                    
                    {{-- @empty

                    sdlasj
                    @endforelse --}}
                    
                    {{-- @endif --}}
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
                        <div class="form-group">
                            <input type="search" name="search-field"  wire:model.live="search" placeholder="بحث عن كتاب أو كاتب">
                            {{-- <input type="search" name="search-field" wire:keyup="getBooks({{ $id }})" wire:model.live="search" placeholder="بحث بعنوان الكتاب أو إسم الكتاب..." required> --}}
                        </div>
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
</div>
