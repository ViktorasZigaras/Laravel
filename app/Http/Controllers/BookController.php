<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', ['books' => Book::all()->sortBy('title')]);
    }

    public function create()
    {
        return view('book.create', ['authors' => Author::all()->sortBy('name')]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => ['required', 'min:8', 'max:64'],
            'isbn' => ['required', 'min:8', 'max:32'],
            'pages' => ['required', 'min:1'],
            'about' => ['required', 'min:0', 'max:128'],
            'author_id' => ['required'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $book = Book::create($request->all());
        // $book->save();
        return redirect()->route('book.index')->with('success_message', '<Book Created>');
    }

    public function show(Book $book)
    {
        // $a = Book::where('name', 'ona')->first();
        // return view show
    }

    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => ['required', 'min:8', 'max:64'],
            'isbn' => ['required', 'min:8', 'max:32'],
            'pages' => ['required', 'min:1'],
            'about' => ['required', 'min:0', 'max:128'],
            'author_id' => ['required'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $book->fill($request->all());
        $book->save();
        return redirect()->route('book.index')->with('success_message', '<Book Updated>');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', '<Book Deleted>');
    }
}
