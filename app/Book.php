<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'pages', 'about', 'author_id'];

    public function author() {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
