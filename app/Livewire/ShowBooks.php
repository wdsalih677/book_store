<?php

namespace App\Livewire;

use App\Models\books\Book;
use App\Models\categories\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBooks extends Component
{
    use WithPagination;
    public $search = '';
    public $showContent = false;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $books = Book::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('auther', 'LIKE', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->paginate(12);
        $cate = Category::get();
        return view('livewire.show-books', ['books' => $books , 'cate' => $cate]);
    }   

    // public function paginationView(){

    //     return 'custom-pagination';

    // }
    public function updatingSearch(){

        $this->resetPage();

    }
    
    public function toggleContent()
    {
        $this->showContent = !$this->showContent;
    }
}
