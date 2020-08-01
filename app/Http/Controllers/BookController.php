<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $authors = Author::all();
        $selectId = 0;
        $sort = '';

        // $products = [];
        // $category = Category::where('id', $request->category)->first();
        // $productss = $category->products->toArray();
        // foreach ($productss as $products_) {
        //     $products[] = Product::where('id', $products_['product_id'])->first();
        // }

        if ($request->author_id) {
            if ($request->sort) {
                if ($request->sort === 'title') {
                    $books = Book::where('author_id', $request->author_id)->orderBy('title')->get();
                    $sort = 'title';
                } elseif ($request->sort === 'isbn') {
                    $books = Book::where('author_id', $request->author_id)->orderBy('isbn')->get();
                    $sort = 'isbn';
                } else {
                    $books = Book::all();
                }
            } else {
                $books = Book::where('author_id', $request->author_id)->get();
            }
            $selectId = $request->author_id;
        } else {
            if ($request->sort) {
                if ($request->sort === 'title') {
                    $books = Book::orderBy('title')->get();
                    $sort = 'title';
                } elseif ($request->sort === 'isbn') {
                    $books = Book::orderBy('isbn')->get();
                    $sort = 'isbn';
                } else {
                    $books = Book::all();
                }
            } else {
                $books = Book::all();
            }
        }

        return view('book.index', compact('books', 'authors', 'selectId', 'sort'));
    }

    public function create() {
        return view('book.create', ['authors' => Author::all()->sortBy('name')]);
    }

    public function store(BookRequest $request) {
        Book::create($request->all());
        return redirect()->route('book.index')->with('success_message', 'Book Created.');
    }

    // public function show(Book $book) {}

    public function edit(Book $book) {
        return view('book.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    public function update(BookRequest $request, Book $book) {
        $book->fill($request->all())->save();
        return redirect()->route('book.index')->with('success_message', 'Book Updated.');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Book Deleted.');
    }
}