@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Book</div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" value="{{old('title')}}" class="form-control">
                           <small class="form-text text-muted">Book Title</small>
                        </div>

                        <div class="form-group">
                           <label>ISBN</label>
                           <input type="text" name="isbn" value="{{old('isbn')}}" class="form-control">
                           <small class="form-text text-muted">Book ISBN</small>
                        </div>

                        <div class="form-group">
                           <label>Pages</label>
                           <input type="text" name="pages" value="{{old('pages')}}" class="form-control">
                           <small class="form-text text-muted">Page Count</small>
                        </div>

                        <div class="form-group">
                           <label>About</label>
                           <input type="hidden" name="about" value="{{old('about')}}">
                           <div id="editor">{{old('about')}}</div>
                           <small class="form-text text-muted">Book Summary</small>
                        </div>

                        <select name="author_id">
                            @foreach ($authors as $author)
                               <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var quill = new Quill('#editor', {theme: 'snow'});
    document.querySelector('#form').onsubmit = () => {
       document.querySelector('input[name=about]').value = JSON.stringify(quill.getContents());
    };
</script>
@endsection