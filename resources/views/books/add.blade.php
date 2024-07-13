<!-- add modal -->
<div class="modal" id="add_book">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة كتاب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-control text-primary">العنوان :</label>
                                <input class="form-control" name="title" type="text">
                                <br>
                                <label class="text-control text-primary">الصوره :</label>
                                <input class="form-control" name="image" type="file" accept="image/*">
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label class="text-control text-primary">الكاتب :</label>
                                <input class="form-control" name="auther" type="text">
                                <br>
                                <label class="text-control text-primary">السعر :</label>
                                <input class="form-control" name="price" type="number">
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label class="text-control text-primary">القسم :</label>
                                <select name="category_id" class="form-control">
                                    <option value="">إختيار ...</option>
                                    @foreach ( $cate as $i )  
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="text-control text-primary">الوصف :</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">حفظ</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End add modal -->