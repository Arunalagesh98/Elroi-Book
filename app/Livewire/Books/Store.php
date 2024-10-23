<?php

namespace App\Livewire\Books;

use App\Models\User;
use App\Models\Books;
use App\Models\Genre;
use Livewire\Component;
use App\Models\PriceRange;
use App\Models\BookDetails;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;

class Store extends ModalComponent
{

    #[Rule('required|max:255')]
    public $name;
    #[Rule('required|regex:/^[a-zA-Z]+$/u|max:255')]
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

    public $users = [];
    public $user = false;

    public function close()
    {
        return $this->dispatch('closeModal', 'books.store');
    }

    public function store()
    {
        $this->validate();
        try {
            $count = Books::latest()->first();

            $isbn = date('dmY') . sprintf('%05d', ($count->id ?? 0 + 1));


            $Book = Books::create([
                'title' => $this->title,
                'auther_name' => $this->name,
                'genre' => $this->genre,
                'price_range' => $this->price,
                'isbn' => $isbn
            ]);

            BookDetails::create([
                'book_id' => $Book->id,
                'price' => $this->hardcover_price,
                'qty' => $this->hardcover_copies,
                'book_type' => 1,
            ]);
            BookDetails::create([
                'book_id' => $Book->id,
                'price' => $this->paperBack_price,
                'qty' => $this->paperBack_copies,
                'book_type' => 2,
            ]);
            BookDetails::create([
                'book_id' => $Book->id,
                'price' => $this->ebook_price,
                'qty' => $this->ebook_copies,
                'book_type' => 3,
            ]);

            $this->reset();
            $this->dispatch('closeModal', 'books.store');
            $this->dispatch('refreshBook');

            return $this->dispatch('alert', ['type' => 'success', 'message' => 'Book Created Successflly']);

        } catch (\Throwable $th) {
            info($th);
        }
    }

    public function updatedName($value)
    {
        $this->user = true;
        $this->users = User::where('name', 'Like', '%' . $value . '%')->get()->take(5);
        return true;
    }
    public function setUser(User $value)
    {

        $this->name = $value->name;
        $this->user = false;
    }



    public function render()
    {

        $genres = Genre::get();
        $prices = PriceRange::get();
        return view('livewire.books.store', ['genres' => $genres, 'prices' => $prices]);
    }
}
