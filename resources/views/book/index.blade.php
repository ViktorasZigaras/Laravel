@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book List</div>
                <div class="card-body">
                    @foreach ($books as $book)
                        <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->author->name}} {{$book->author->surname}}</a>
                        <form method="POST" action="{{route('book.destroy', [$book])}}">
                            @csrf
                            <button type="submit">DELETE</button>
                            <small class="text-muted">{{$book->about}}</small>
                        </form>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection