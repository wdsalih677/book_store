<!-- edit modal -->
<div class="modal" id="edit_cate{{ $cate->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('categories.update', $cate->id ) }}" method="post">
                        {{ method_field('PATCH') }}
                        @csrf
                        <label class="text-primary"> اسم القسم :</label>
                        <input type="text" name="name" class="form-control" value="{{ $cate->name }}">
                        <input type="hidden" name="id" value="{{ $cate->id }}">
                        <br>
                        <label class="text-primary"> وصف القسم :</label>
                        <textarea name="description" class="form-control">{{  $cate->description  }}</textarea>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End edit modal -->