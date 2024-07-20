<?php

namespace App\Http\Controllers\blogs;

use App\Http\Controllers\Controller;
use App\Models\blogs\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{

    public function index()
    {
        $users = User::get();//get users when role == admin

        $blogs = Blog::get();
        return view('blogs.blogs', compact('users','blogs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request , [
                'title' => 'required|unique:blogs',
                'post_by' => 'required',
                'blog_text' => 'required|unique:blogs',
                'image' => 'required|mimes:jpeg,jpg,png'
            ],[
                'title.required' => 'يجب إدخال عنوان المدونه',
                'title.unique' => 'عنوان المدونه مكرر',
    
                'post_by.required' => 'يجب تحديد الناشر',
    
                'blog_text.required' => 'يجب إدخال نص المدونه',
                'blog_text.unique' => 'نص المدونه مكرر',
    
                'image.required' => 'يجب تحديد الصوره',
                'image.mimes' => 'يجب أن تكون صيغة الصورة (jpeg,jpg,png)',
            ]);
    
            $blogs = new Blog();
            $blogs->title = $request->title;
            $blogs->post_by = $request->post_by;
            $blogs->blog_text = $request->blog_text;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->storeAs($request->title, $name, 'public');
                $blogs->image = $name;
            }
            $blogs->save();
            toast('تم إضافة المدونه بنجاح','success');
            return redirect()->route('blogeBackEnd.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        try{
            $this->validate($request , [
                'title' => 'required|unique:blogs,title,'.$id,
                'post_by' => 'required',
                'blog_text' => 'required|unique:blogs,blog_text,'.$id,
                'image' => 'mimes:jpeg,jpg,png'
            ],[
                'title.required' => 'يجب إدخال عنوان المدونه',
                'title.unique' => 'عنوان المدونه مكرر',
    
                'post_by.required' => 'يجب تحديد الناشر',
    
                'blog_text.required' => 'يجب إدخال نص المدونه',
                'blog_text.unique' => 'نص المدونه مكرر',
    
                'image.mimes' => 'يجب أن تكون صيغة الصورة (jpeg,jpg,png)',
            ]);

            $blog = Blog::findOrFail($id);
            $oldTitle = $blog->title;
            $blog->title = $request->title;
            $blog->post_by = $request->post_by;
            $blog->blog_text = $request->blog_text;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->storeAs($request->title, $name, 'public');
                $blog->image = $name;
            }else{
                if ($oldTitle !== $request->title) {
                    Storage::move("public/{$oldTitle}", "public/{$request->title}");
                }
            }
            $blog->save();
            toast('تم تعديل المدونه بنجاح','success');
            return redirect()->route('blogeBackEnd.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try{
            Blog::findOrFail($id)->delete();
            toast('تم حذف المدونه بنجاح','success');
            return redirect()->route('blogeBackEnd.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
