<!-- add modal -->
<div class="modal" id="delete_blog{{ $blog->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-danger">حذف مدونة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            
                @csrf
                <div class="modal-body">
                    <form action="{{ route('blogeBackEnd.destroy' , $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-danger" for="">عنوان المدونه :</label>
                                <input class="form-control"  type="text" name="title" value="{{ $blog->title }}" disabled>
                                <br>
                                <label class="text-danger" for="">الصورة :</label>
                                <input class="form-control" type="file" name="image" accept="image/*" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="text-danger" for="">نشر بواسطة :</label>
                                <select name="post_by" class="form-control" id="" disabled>
                                    @foreach ( $users as $user )
                                        <option value="{{ $user->id }}" {{ $user->id == $blog->post_by ? 'select' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('storage/'. $blog->title .'/'.$blog->image) }}" height="159px" >
                            </div>
                            <div class="col-md-8">
                                <br>
                                <label class="text-danger" for="">نص المدونه :</label>
                                <textarea name="blog_text" class="form-control" rows="5" disabled>{{ $blog->blog_text }}</textarea>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit">حذف</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<!-- End add modal -->