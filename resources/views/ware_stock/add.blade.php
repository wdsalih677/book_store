<!-- Large Modal -->
<div class="modal" id="add_stock">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة مخزون</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ware_stock.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-control text-primary">المستودع :</label>
                            <select class="form-control" name="warehouses_id" id="">
                                <option value="">إختيار...</option>
                                @foreach ( $warehouses as $ware )
                                    <option value="{{ $ware->id }}">{{ $ware->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">الكميه :</label>
                            <input type="number" class="form-control" name="quantity">
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">القسم :</label>
                            <select class="form-control" name="category_id" id="">
                                <option value="">إختيار...</option>
                                @foreach ( $categories as $cate )
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="text-control text-primary">الكتب :</label>
                            <br>
                            <select class="form-control" name="book_id">

                            </select>
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