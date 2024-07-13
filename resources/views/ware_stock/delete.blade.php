<!-- Large Modal -->
<div class="modal" id="delete_stock{{ $ware_stock->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-danger">حذف مخزون</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ware_stock.destroy',$ware_stock->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-control text-danger">المستودع :</label>
                            <select class="form-control" name="warehouses_id" id="" disabled>
                                @foreach ( $warehouses as $ware )
                                    <option value="{{ $ware->id }}" {{ $ware_stock->warehouses_id == $ware->id ? 'select' : ''}} >{{ $ware->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-danger">الكميه :</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $ware_stock->quantity }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-danger">القسم :</label>
                            <select class="form-control" name="category_id" id="" disabled>
                                @foreach ( $categories as $cate )
                                    <option value="{{ $cate->id }}" {{ $ware_stock->category_id == $cate->id ? 'select' : ''}}>{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-danger">الكتب :</label>
                            <br>
                            <select class="form-control" name="book_id" disabled>
                                @foreach ( $books as $x )
                                    <option value="{{ $x->id }}" {{ $ware_stock->book_id == $x->id ? 'select' : ''}} >{{ $x->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-danger" type="submit">حذف</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Large Modal -->