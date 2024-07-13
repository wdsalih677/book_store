<!-- add modal -->
<div class="modal" id="add_cate">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <label class="text-primary"> اسم القسم :</label>
                        <input type="text" name="name" class="form-control">
                        <br>
                        <label class="text-primary"> وصف القسم :</label>
                        <textarea name="description" class="form-control"></textarea>
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