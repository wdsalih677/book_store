<!-- add modal -->
<div class="modal" id="add_blog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة مدونة جديده</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('blogeBackEnd.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-primary" for="">عنوان المدونه :</label>
                                <input class="form-control"  type="text" name="title">
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary" for="">نشر بواسطة :</label>
                                <select name="post_by" class="form-control" id="">
                                    <option value="">إختيار..</option>
                                    @foreach ( $users as $user )
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label class="text-primary" for="">الصورة :</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                                <br>
                                <label class="text-primary" for="">نص المدونه :</label>
                                <textarea name="blog_text" class="form-control" rows="5"></textarea>
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