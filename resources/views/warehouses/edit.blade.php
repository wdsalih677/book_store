<!-- edit modal -->
<div class="modal" id="edit_ware{{ $ware->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل مستودع</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('warehouses.update',$ware->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" value="{{ $ware->id }}"  name="id">
                        <label class="text-primary"> اسم مستودع :</label>
                        <input type="text" name="name" class="form-control" value="{{  $ware->name }}">
                        <br>
                        <label class="text-primary"> الموقع  :</label>
                        <textarea name="location" class="form-control">{{  $ware->location }}</textarea>
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