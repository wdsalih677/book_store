<!-- Large Modal -->
<div class="modal" id="add_roles">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة صلاحيه</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <label class="text-primary">إسم الصلاحيه :</label>
                    <input type="text" name="name" class="form-control">
                    <br>
                        <label class="text-primary">الأذونات :</label>
                        <div class="row">
                            @foreach ($permissions as $x )
                                    <div class="col-md-3">
                                        <input type="checkbox" name="permission[]" value="{{ $x->name }}">
                                        <label class="text-primary">{{ $x->name }}</label>
                                    </div>
                            @endforeach
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
<!--End Large Modal -->