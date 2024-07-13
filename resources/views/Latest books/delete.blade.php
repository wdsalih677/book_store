<!-- delete modal -->
<div class="modal" id="delete_Latest_books{{ $latest_book->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-danger">حذف العرض</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body">
                    <form action="{{ route('Latest_books.destroy' , $latest_book->id) }}" method="post">
                        {{ method_field("DELETE") }}
                        @csrf
                        <label class="text-danger"> اسم الكتاب :</label>
                        <input type="text" name="book_id" class="form-control" value="{{ $latest_book->books->title }}" disabled>
                        <input type="hidden" name="id" value="{{ $latest_book->id }}" >
                        <br>
                        <label class="text-danger"> السعر :</label>
                        <input type="text" name="offer_price" class="form-control" value="{{ $latest_book->offer_price }}" disabled>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit">حذف</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End delete modal -->