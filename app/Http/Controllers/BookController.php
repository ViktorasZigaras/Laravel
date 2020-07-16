<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', ['books' => Book::all()->sortBy('title')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', ['authors' => Author::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $book->save();
        return redirect()->route('book.index')->with('success_message', '<Book Created>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $a = Book::where('name', 'ona')->first();
        // return view show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', '<Book Deleted>');
    }
}
