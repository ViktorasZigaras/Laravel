<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{
    public function index()
    {
        // $authors = Author::orderBy('field', 'asc/desc')->get(); + multiple order bys for more sorting
        // $authors = Author::all()->sortBy/Desc('field');
        return view('author.index', ['authors' => Author::all()->sortBy('name')]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => ['required', 'min:3', 'max:64'],
            'surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $author = Author::create($request->all());
        $author->save();
        return redirect()->route('author.index')->with('success_message', '<Author Created>');
    }

    public function show(Author $author)
    {
        //
    }

    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => ['required', 'min:3', 'max:64'],
            'surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $author->fill($request->all());
        $author->save();
        return redirect()->route('author.index')->with('success_message', '<Author Updated>');
    }

    public function destroy(Author $author)
    {
        if ($author->authorBooks->count()) {
            return redirect()->route('author.index')->with('info_message', '<Author Has Books>');
        }
        $author->delete();
        return redirect()->route('author.index')->with('success_message', '<Author Deleted>');
    }
}
