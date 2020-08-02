@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Author List</div>
                <div class="card-body">
                    @foreach ($authors as $author)
                        <div class="list-text"> {{$author->name}} {{$author->surname}} </div>
                        <div class="flex">
                            <form method="GET" action="{{route('author.edit', [$author])}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">EDIT</button>
                            </form>
                            <form method="POST" action="{{route('author.destroy', [$author])}}">
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