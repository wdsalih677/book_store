<!-- add modal -->
<div class="modal" id="add_user">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة مستخدم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label class="text-primary">الإسم :</label>
                                <input type="text" name="name" class="form-control">
                                <br>
                                <label class="text-primary">البريد الإلكتروني :</label>
                                <input type="email" name="email" class="form-control" autocomplete="off">
                            </div>
                            <div class="col">
                                <label class="text-primary">الحاله :</label>
                                <select name="status" class="form-control">
                                    <option value="1">نشط</option>
                                    <option value="0">غير نشط</option>
                                </select>
                                <br>
                                <label class="text-primary">كلمة السر :</label>
                                <input type="password" class="form-control" name="password" autocomplete="off">
                            </div>
                        </div>
                        <br>
                        <label class="text-primary">الصلاحيه :</label>
                        <select name="role_name" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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