<div>
    <div class="col-sm-6 col-md-3 float-left">
        <input class="form-control" placeholder="بحث..." wire:model.live="search">
        
    </div>
    <br><br><br><br>
    <div class="row">
        @foreach ( $books as $book )
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">{{ $book->title }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="text-control"> الكاتب : {{ $book->auther }}</label>
                                <hr>
                                <label class="text-control"> الوصف : {{ $showContent ? $book->description : substr($book->description, 0, 20) }}</label>
                                @if(strlen($book->description) > 20)
                                    <a class="text-control text-primary" wire:click="toggleContent">{{ $showContent ? 'قرأءة أقل' : 'قرأءة المزيد' }}</a>
                                @endif
                                <hr>
                                <label class="text-control"> القسم : {{ $book->categories->name }}</label>
                                <hr>
                                <label class="text-control"> السعر : {{ $book->price }}</label>
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/'. $book->title .'/'.$book->image) }}" height="230px" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @can('تعديل كتاب')
                            <button class="btn btn-success" data-target="#edit_book{{ $book->id }}" data-toggle="modal">تعديل </button>
                        @endcan
                        @can('حذف كتاب')
                            <button class="btn btn-danger float-left" data-target="#delete_book{{ $book->id }}" data-toggle="modal">حذف</button>
                        @endcan
                    </div>
                </div>
            </div>
            @include('books.edit')
            @include('books.delete')
        @endforeach
    </div>
    {{ $books->links('pagination::bootstrap-4') }}
</div>
