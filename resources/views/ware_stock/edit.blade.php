<!-- Large Modal -->
<div class="modal" id="edit_stock{{ $ware_stock->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل مخزون</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ware_stock.update',$ware_stock->id ) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" value="{{ $ware_stock->id }}" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-control text-primary">المستودع :</label>
                            <select class="form-control" name="warehouses_id">
                                @foreach ( $warehouses as $ware )
                                    <option value="{{ $ware->id }}" {{ $ware_stock->warehouses_id == $ware->id ? 'select' : ''}} >{{ $ware->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">الكميه :</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $ware_stock->quantity }}">
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">القسم :</label>
                            <select class="form-control" name="category_id">
                                @foreach ( $categories as $cate )
                                    <option value="{{ $cate->id }}" {{ $ware_stock->category_id == $cate->id ? 'select' : ''}}>{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">الكتب :</label>
                            <br>
                            <select class="form-control" name="book_id">
                                @foreach ( $books as $x )
                                    <option value="{{ $x->id }}" {{ $ware_stock->book_id == $x->id ? 'select' : ''}} >{{ $x->title }}</option>
                                @endforeach
                            </select>
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