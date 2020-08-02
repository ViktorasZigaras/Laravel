@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Book List <br>
                    <div class="flex">
                        <form action="{{route('book.index')}}" method="get" class="filter-form">
                            Authors: <select name="author_id">
                                <option value="0">Show All</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}" @if($selectId == $author->id) selected @endif>{{$author->name}} {{$author->surname}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">FILTER</button><br>
                            Sort By: 
                            Title <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif>
                            Isbn <input type="radio" name="sort" value="isbn" @if('isbn' == $sort) checked @endif><br>
                        </form>
                        <form action="{{route('book.index')}}" method="get" class="reset-form">
                            <button type="submit" class="btn btn-primary">RESET</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($books as $book)

                        <div class="list-text"> {{$book->title}} </div>
                        <div class="list-text"> {{$book->author->name}} {{$book->author->surname}} </div>
                        <small class="text-muted"> Pages: {{$book->pages}} </small><br>
                        <small class="text-muted"> {{$book->isbn}} </small><br>
                        <small class="text-muted"> {{$book->about}} </small><br>
                        <div class="flex">
                            <form method="GET" action="{{route('book.edit', [$book])}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">EDIT</button>
                            </form>
                            <form method="POST" action="{{route('book.destroy', [$book])}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">DELETE</button>
                            </form>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection