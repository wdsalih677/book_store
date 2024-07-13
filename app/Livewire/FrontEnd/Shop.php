<?php

namespace App\Livewire\FrontEnd;

use App\Models\books\Book;
use App\Models\categories\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{   
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    // public $category=[], $categories = [], $id;

    // /**
    //  * where('title', 'LIKE', '%' . $this->search . '%')
    //                         ->orWhere('auther', 'LIKE', '%' . $this->search . '%')
    //                         ->orWhere('description', 'LIKE', '%' . $this->search . '%')
    //                         ->orWhere('price', 'LIKE', '%' . $this->search . '%')
    //                         ->
    //  */

    // public function mount()
    // {
    //     $this->categories = Book::get();
    // }

    // public function loadData($id){

    // }

    
    public function render()
    {
        $books = Book::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('auther', 'LIKE', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->paginate(12);
        $cate = Category::get();
        return view('livewire.front-end.shop', ['books' => $books , 'cate' => $cate]);
    } 

    // public function getBooks($id)
    // {
    //     $this->id = $id;
    //     $this->category = [];
    //     $cate = Category::with('books')->where('id', $id)->first();
    //     if($this->search == '')
    //     {
    //         $this->category = Book::where('category_id', $this->id)->get();
    //     }else{
    //         $this->category = Book::where('category_id', $this->id)->where(function($query){ 
    //             $query->where('title', 'LIKE', '%' . $this->search . '%')
    //             ->orWhere('auther', 'LIKE', '%' . $this->search . '%')
    //             ->orWhere('description', 'LIKE', '%' . $this->search . '%')
    //             ->orWhere('price', 'LIKE', '%' . $this->search . '%');
    //         })->paginate(6);
    //     }
    // }
}