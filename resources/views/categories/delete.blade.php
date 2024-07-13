<!-- delete modal -->
<div class="modal" id="delete_cate{{ $cate->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-danger">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('categories.destroy' , $cate->id) }}" method="post">
                        {{ method_field("DELETE") }}
                        @csrf
                        <label class="text-danger"> اسم القسم :</label>
                        <input type="text" name="name" class="form-control" value="{{ $cate->name }}" disabled>
                        <input type="hidden" name="id" value="{{ $cate->id }}" >
                        <br>
                        <label class="text-danger"> وصف القسم :</label>
                        <textarea name="description" class="form-control" disabled>{{  $cate->description  }}</textarea>
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