<?php

namespace App\Livewire\Books;

use App\Models\Books;
use Livewire\Component;
use App\Models\BookDetails;
use LivewireUI\Modal\ModalComponent;

class View extends ModalComponent
{
    public $id;
    public Books $book;
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $genre;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $hardcover_copies;
    #[Rule('required')]
    public $hardcover_price;
    #[Rule('required')]
    public $paperBack_copies;
    #[Rule('required')]
    public $paperBack_price;
    #[Rule('required')]
    public $ebook_copies;
    #[Rule('required')]
    public $ebook_price;

    public function close()
    {
        return $this->dispatch('closeModal', 'books.edit');
    }
    public function mount($book)
    {

        $this->id = $book->id;
        $this->name = $book->auther_name;
        $this->title = $book->title;
        $this->genre = $book->genre;
        $this->price = $book->price_range;
        $bookDetails = BookDetails::where('book_id', $book->id);
        $this->hardcover_copies = $bookDetails->clone()->where('book_type', 1)->first()->qty;
        $this->hardcover_price = $bookDetails->clone()->where('book_type', 1)->first()->price;
        $this->paperBack_copies = $bookDetails->clone()->where('book_type', 2)->first()->qty;
        $this->paperBack_price = $bookDetails->clone()->where('book_type', 2)->first()->price;
        $this->ebook_copies = $bookDetails->clone()->where('book_type', 3)->first()->qty;
        $this->ebook_price = $bookDetails->clone()->where('book_type', 3)->first()->price;
    }
    public function render()
    {
        return view('livewire.books.view');
    }
}
