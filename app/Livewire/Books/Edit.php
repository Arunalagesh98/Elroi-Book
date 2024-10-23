<?php

namespace App\Livewire\Books;

use App\Models\Books;
use App\Models\Genre;
use Livewire\Component;
use App\Models\PriceRange;
use App\Models\BookDetails;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    public $id;
    public Books $book;
    #[Rule('required|alpha|max:255')]
    public $name;
    #[Rule('required|alpha|max:255')]
    public $title;
    #[Rule('required')]
    public $genre;
    #[Rule('required')]
    public $price;
    #[Rule('required|numeric')]
    public $hardcover_copies;
    #[Rule('required|numeric')]
    public $hardcover_price;
    #[Rule('required|numeric')]
    public $paperBack_copies;
    #[Rule('required|numeric')]
    public $paperBack_price;
    #[Rule('required|numeric')]
    public $ebook_copies;
    #[Rule('required|numeric')]
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


    public function update()
    {
        $this->validate();
        try {



            $Book = Books::where('id', $this->id)->update([
                'title' => $this->title,
                'auther_name' => $this->name,
                'genre' => $this->genre,
                'price_range' => $this->price,
               
            ]);

            BookDetails::where('book_id', $this->id)->where('book_type', 1)->update([
               
                'price' => $this->hardcover_price,
                'qty' => $this->hardcover_copies,
                'book_type' => 1,
            ]);
            BookDetails::where('book_id', $this->id)->where('book_type', 2)->update([
               
                'price' => $this->paperBack_price,
                'qty' => $this->paperBack_copies,
                'book_type' => 2,
            ]);
            BookDetails::where('book_id', $this->id)->where('book_type', 3)->update([
               
                'price' => $this->ebook_price,
                'qty' => $this->ebook_copies,
                'book_type' => 3,
            ]);

            $this->reset();
            $this->dispatch('closeModal', 'books.edit');
            $this->dispatch('refreshBook');

            return $this->dispatch('alert', ['type' => 'success', 'message' => 'Book Created Successflly']);

        } catch (\Throwable $th) {
            info($th);
        }
    }
    public function render()
    {
        $genres = Genre::get();
        $prices = PriceRange::get();
        return view('livewire.books.edit', ['genres' => $genres, 'prices' => $prices]);
    }
}
