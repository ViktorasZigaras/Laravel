<?php

namespace App\Http\Controllers;

use App\Models\Author;
// use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        # $authors = Author::orderBy('field', 'asc/desc')->get(); + multiple order bys for more sorting
        # $authors = Author::all()->sortBy/Desc('field');
        return view('author.index', ['authors' => Author::all()->sortBy('name')]);
    }

    public function create() {
        return view('author.create');
    }

    public function store(AuthorRequest $request) {
        Author::create($request->all());
        return redirect()->route('author.index')->with('success_message', 'Author Created.');
    }

    // public function show(Author $author) {}

    public function edit(Author $author) {
        return view('author.edit', ['author' => $author]);
    }

    public function update(AuthorRequest $request, Author $author) {
        $author->fill($request->all())->save();
        return redirect()->route('author.index')->with('success_message', 'Author Updated.');
    }

    public function destroy(Author $author) {
        if ($author->books->count()) {
            return redirect()->back()->with('info_message', 'Author Has Books.');
        }
        $author->delete();
        return redirect()->back()->with('success_message', 'Author Deleted.');
    }
}