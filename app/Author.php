<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    protected $fillable = array('name', 'surname');

    public function authorBooks() {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
