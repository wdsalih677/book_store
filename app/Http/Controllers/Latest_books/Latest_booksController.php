<?php

namespace App\Http\Controllers\Latest_books;

use App\Http\Controllers\Controller;
use App\Models\books\Book;
use App\Models\categories\Category;
use App\Models\Latest_book\Latest_book;
use Illuminate\Http\Request;

class Latest_booksController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:قائمة أحدث الكتب', ['only' => ['index']]);
        $this->middleware('permission:إضافة أحدث كتاب', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل أحدث كتاب', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف أحدث كتاب', ['only' => ['destroy']]);

    }
    public function index()
    {
        $categries = Category::get();
        $books = Book::get();
        $latest_books = Latest_book::get();
        return view('Latest books.Latest_books', compact('categries','books','latest_books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request , [
                'offer_price' => 'required|numeric|min:1',
                'category_id' => 'required',
                'book_id' => 'required'
            ],[
                
                'offer_price.required' => 'يجب تحديد سعر العرض',
                'offer_price.numeric' => 'يجب ان يكون سعر العرض ارقام',
                'offer_price.min' => 'يجب ان يكون أقل سعر العرض 1 فقط',
    
                'category_id.required' => 'يجب تحديد القسم',
    
                'book_id.required' => 'يحب تحديد كتاب واحد على الأقل',
            ]);
            $latest_books = new Latest_book();
            $latest_books->category_id = $request->category_id;
            $latest_books->offer_price = $request->offer_price;
            $latest_books->book_id = $request->book_id;
            $latest_books->save();
            toast('تم إضافة العرض بنجاح' ,'success');
            return redirect()->route('Latest_books.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try{
        $this->validate($request , [
            'offer_price' => 'required|numeric|min:1',
            'category_id' => 'required',
            'book_id' => 'required'
        ],[
            
            'offer_price.required' => 'يجب تحديد سعر العرض',
            'offer_price.numeric' => 'يجب ان يكون سعر العرض ارقام',
            'offer_price.min' => 'يجب ان يكون أقل سعر العرض 1 فقط',

            'category_id.required' => 'يجب تحديد القسم',

            'book_id.required' => 'يحب تحديد كتاب واحد على الأقل',
        ]);

        $latest_books = Latest_book::findOrFail($id);
        $latest_books->update([
            'category_id' => $request->category_id,
            'book_id' => $request->book_id,
            'offer_price' => $request->offer_price
        ]);
        toast('تم تعديل العرض بنجاح' , 'success');
        return redirect()->route('Latest_books.index');
       }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Latest_book::findOrFail($id)->delete();
            toast('تم حذف العرض بنجاح' , 'success');
            return redirect()->route('Latest_books.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
