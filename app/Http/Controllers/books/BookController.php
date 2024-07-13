<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use App\Models\books\Book;
use App\Models\categories\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index()
    {
        $cate = Category::get();
        return view('books.books', compact('cate'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|unique:books|max:50',
                'auther' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,jpg,png|required',
                'price' => 'required',
                'category_id' => 'required'
            ], [
                'title.required' => 'بجب إدخال عنوان الكتاب',
                'title.unique' => 'عنوان الكتاب مكرر',
                'title.max' => 'يجب أن لا يتجاوز عنوان الكتاب 50 حرف',

                'auther.required' => 'يجب إدخال اسم الكاتب',

                'descriptio.required' => 'يجب إدخال وصف الكتاب',

                'image.mimes' =>  'يجب ان تكون صيغة الصورة (jpeg,jpg,png)',
                'image.required' => 'يجب إدخال الصورة',

                'price.required' => 'يجب تحديد السعر',
                'category_id' => 'يجب تحديد القسم',
            ]);

            $books = new Book();
            $books->title = $request->title;
            $books->auther = $request->auther;
            $books->description = $request->description;
            $books->price = $request->price;
            $books->category_id = $request->category_id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $imageName = $image->storeAs($request->title, $name, 'public');
                $books->image = $name;
            }
            $books->save();
            toast('تم إضافة الكتاب بنجاح', 'success');
            return redirect()->route('books.index');
        } catch (\Exception $e) {
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
            $this->validate($request, [
                'title' => 'required|max:50|unique:books,title,' . $id,
                'auther' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,jpg,png',
                'price' => 'required',
            ], [
                'title.required' => 'بجب إدخال عنوان الكتاب',
                'title.unique' => 'عنوان الكتاب مكرر',
                'title.max' => 'يجب أن لا يتجاوز عنوان الكتاب 50 حرف',
    
                'auther.required' => 'يجب إدخال اسم الكاتب',
    
                'descriptio.required' => 'يجب إدخال وصف الكتاب',
    
                'image.mimes' =>  'يجب ان تكون صيغة الصورة (jpeg,jpg,png)',
    
                'price.required' => 'يجب تحديد السعر',
                'category_id.required' => 'يجب تحديد القسم',
            ]);
            $book = Book::findOrFail($request->id);
            $oldTitle = $book->title;
            
            $book->title = $request->title;
            $book->auther = $request->auther;
            $book->description = $request->description;
            $book->price = $request->price;
            $book->category_id = $request->category_id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->storeAs($request->title, $name, 'public');
                $book->image = $name;
            }else{
                if ($oldTitle !== $request->title) {
                    Storage::move("public/{$oldTitle}", "public/{$request->title}");
                }
            }
            $book->save();
            toast('تم تعديل الكتاب بنجاح', 'success');
            return redirect()->route('books.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        Book::findOrFail($id)->delete();
        toast('تم حذف الكتاب بنجاح', 'success');
        return redirect()->route('books.index');
    }
    public function getBooks($id){
        $listBooks = Book::where('category_id', $id)->pluck("title",'id');
        return $listBooks;
    }
}
