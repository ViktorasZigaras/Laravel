<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'pages', 'about', 'author_id'];

    public function author() {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
