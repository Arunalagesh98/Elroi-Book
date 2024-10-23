<?php

namespace App\Livewire\Books;

use App\Models\Books;
use Livewire\Component;
use App\Models\BookDetails;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $listeners = ['refreshBook' => '$refresh'];

    public function add()
    {
        return $this->dispatch('openModal', 'books.store');
    }

    public function delete(Books $books)
    {
        // dd($books);
        $bookDetails = BookDetails::where('book_id', $books->id)->delete();-
        $books->delete();

        return $this->dispatch('refreshBook');
    }

    public function view($id){
        return $this->dispatch('openModal','books.view',arguments:['book' => $id]);
    }
    public function edit($id){
        return $this->dispatch('openModal','books.edit',arguments:['book' => $id]);
    }


    public function render()
    {
        $items = Books::with('price', 'genreName')->paginate();
        return view('livewire.books.table', ['items' => $items]);
    }
}
