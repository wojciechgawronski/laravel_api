<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'publication_year'];

    // http://127.0.0.1:8000/api/v1/books/2
    // 2 - becaouse of ATTRIBUTES book_author table- relation
    public function author(){
        return $this->hasManyThrough(
            '\App\Models\Author',
            '\App\Models\BookAuthor',
            'book_id',
            'id',
            'id',
            'author_id',
        );
    }
}
