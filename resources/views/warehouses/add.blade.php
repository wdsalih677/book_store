<!-- add modal -->
<div class="modal" id="add_ware">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة مستودع</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('warehouses.store') }}" method="post">
                        @csrf
                        <label class="text-primary"> اسم مستودع :</label>
                        <input type="text" name="name" class="form-control">
                        <br>
                        <label class="text-primary"> الموقع  :</label>
                        <textarea name="location" class="form-control" placeholder="وصف الموقع"></textarea>
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