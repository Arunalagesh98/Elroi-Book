<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'auther_name', 'genre', 'price_range', 'isbn'];


    public function genreName()
    {
        return $this->hasOne(Genre::class, 'id', 'genre');
    }
    public function price()
    {
        return $this->hasOne(PriceRange::class, 'id', 'price_range');
    }
    public function bookDetails()
    {
        return $this->hasMany(BookDetails::class, 'book_id', 'id');
    }
}
