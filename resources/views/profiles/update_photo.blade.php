<!-- delete modal -->
<div class="modal" id="update_photo">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-primary">إضافة صورة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="" method="post">
                        {{ method_field("DELETE") }}
                        @csrf
                        <input type="file" name="name" class="form-control">
                        <input type="hidden" name="id"  >
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">إضافه</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End delete modal -->