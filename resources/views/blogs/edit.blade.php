<!-- add modal -->
<div class="modal" id="edit_blog{{ $blog->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل مدونة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('blogeBackEnd.update' , $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-primary" for="">عنوان المدونه :</label>
                                <input class="form-control"  type="text" name="title" value="{{ $blog->title }}">
                                <br>
                                <label class="text-primary" for="">الصورة :</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label class="text-primary" for="">نشر بواسطة :</label>
                                <select name="post_by" class="form-control" id="">
                                    @foreach ( $users as $user )
                                        <option value="{{ $user->id }}" {{ $user->id == $blog->post_by ? 'select' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('storage/'. $blog->title .'/'.$blog->image) }}" height="159px">
                            </div>
                            <div class="col-md-8">
                                <br>
                                <label class="text-primary" for="">نص المدونه :</label>
                                <textarea name="blog_text" class="form-control" rows="5">{{ $blog->blog_text }}</textarea>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End add modal -->