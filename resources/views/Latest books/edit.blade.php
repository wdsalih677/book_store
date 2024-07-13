<!-- Large Modal -->
<div class="modal" id="edit_Latest_books{{ $latest_book->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل أحدث الكتب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Latest_books.update', $latest_book->id ) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $latest_book->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-control text-primary">إختيار القسم :</label>
                            <select class="form-control" name="category_id" id="">
                                @foreach ($categries as $cat )
                                    <option value="{{ $cat->id }}" {{ $cat->id  == $latest_book->category_id ? 'selected' : ''}}>{{ $cat->name }}</option>  
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">إختيار الكتاب :</label>
                            <select class="form-control" name="book_id" id="">
                                @foreach ( $books as $x )
                                    <option value="{{ $x->id }}" {{ $latest_book->book_id == $x->id ? 'selected' : ''}} >{{ $x->title }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">سعر العرض :</label>
                            <input type="number" class="form-control" name="offer_price" value="{{ $latest_book->offer_price }}">
                        </div>
                    </div>
                    <br>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">تعديل</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Large Modal -->