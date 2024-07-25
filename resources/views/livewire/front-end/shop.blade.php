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
                                <br>
                                <hr>
                                
                                <form action="{{ route('front_end/add_to_cart',$book->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                </svg>
                                                إضافه للعربه 
                                            </button>
                                        </div>
                                        <div class="col">
                                            <input type="number" name="qty" class="form-control" value="1">
                                            <input type="hidden" name="id"  value="{{ $book->id }}">
                                        </div>
                                    </div>
                                        
                                        
                                </form>
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
