<!-- Large Modal -->
<div class="modal" id="add_Latest_books">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة أحدث الكتب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Latest_books.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-control text-primary">إختيار القسم :</label>
                            <select class="form-control" name="category_id" id="">
                                <option value="">إختيار...</option>
                                @foreach ($categries as $cat )
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>  
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">إختيار الكتاب :</label>
                            <select class="form-control" name="book_id" id="">
                                <option value="">إختيار...</option>
                                    <option value="">...</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">سعر العرض :</label>
                            <input type="number" class="form-control" name="offer_price">
                        </div>
                    </div>
                    <br>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">إضافه</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Large Modal -->