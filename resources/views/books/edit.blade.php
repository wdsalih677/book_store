<!-- add modal -->
<div class="modal" id="edit_book{{ $book->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل كتاب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('books.update',$book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-control text-primary">العنوان :</label>
                                <input class="form-control" name="title" type="text" value="{{ $book->title }}">
                                <br>
                                <label class="text-control text-primary">السعر :</label>
                                <input class="form-control" name="price" type="number" value="{{ $book->price }}">
                            </div>
                            <div class="col-md-4">
                                <label class="text-control text-primary">الكاتب :</label>
                                <input class="form-control" name="auther" type="text" value="{{ $book->auther }}">
                                <br>
                                <label class="text-control text-primary">الصوره :</label>
                                <input class="form-control" name="image" type="file" accept="image/*">
                            </div>
                            <div class="col-md-4 text-center">
                                <br>
                                <img src="{{ asset('storage/'. $book->title .'/'.$book->image) }}" height="159px">
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label class="text-control text-primary">القسم :</label>
                                <select name="category_id" class="form-control">
                                    @foreach ( $cate as $i )  
                                        <option value="{{ $i->id }}" {{ $i->id == $book->category_id ? 'select' : '' }}>{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label class="text-control text-primary">الوصف :</label>
                                <textarea class="form-control" name="description">{{ $book->description }}</textarea>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End add modal -->