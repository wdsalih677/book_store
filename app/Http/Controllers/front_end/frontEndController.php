<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use App\Models\blogs\Blog;
use App\Models\books\Book;
use App\Models\categories\Category;
use App\Models\Latest_book\Latest_book;
use Illuminate\Http\Request;

class frontEndController extends Controller
{
    public function about()
    {
        return view('front_end.about');
    }
    //function to show blogs
    public function blogs()
    {
        $blogs = Blog::get();
        return view('front_end.blogs',compact('blogs'));
    }
    //function to show blog details
    public function blog_detail($id)
    {
        $blog_detail = Blog::findOrFail($id);
        return view('front_end.blog-detail',compact('blog_detail'));
    }
    //functon to show books (livewire)
    public function shop()
    {
        return view('front_end.shop');
    }
    //function to show book details
    public function shop_detail($id)
    {
        $book = Book::findOrfail($id);
        $cate = Category::get();
        return view('front_end.shop-detail' , compact('book','cate'));
    }
    //function to show category
    public function show_category($id)
    {
        $category = Category::findOrFail($id);
        $books = $category->books()->paginate(12);
        $cate = Category::get();
        return view('front_end.show-category',compact('category','books','cate'));
    }
    public function live_search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', "%$query%")
                ->orWhere('auther', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query")
                ->orWhere('price', 'LIKE', "%$query%")
                ->get();
        return response()->json($books);
    }
    public function add_to_cart($id)
    {

        $book = Book::findOrFail($id);
        $cart = session()->get('cart' ,[]);
        if (!is_array($cart)) {
            $cart = [];
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = isset($cart[$id]['quantity']) ? $cart[$id]['quantity'] + 1 : 1;
        } else {
            $cart[$id] = [
                'id' => $book->id,
                'title' => $book->title,
                'price' => $book->price,
                'quantity' => 1,
            ];
        }
        
        session()->put('cart' ,  $cart );
        toast('تم إضافة الكتاب للعربه','success');
        return redirect()->back();

    }
    //function to get latest booke
    public function getLatestBooks()
    {
        $latestBooks = Latest_book::paginate(10);
        return view('front_end.latest_books',compact('latestBooks'));
    }
}
