@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Book</div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.update',[$book])}}" id="form">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" value="{{old('title',$book->title)}}" class="form-control">
                           <small class="form-text text-muted">Book Title</small>
                        </div>

                        <div class="form-group">
                           <label>ISBN</label>
                           <input type="text" name="isbn" value="{{old('isbn',$book->isbn)}}" class="form-control">
                           <small class="form-text text-muted">Book ISBN</small>
                        </div>

                        <div class="form-group">
                           <label>Pages</label>
                           <input type="text" name="pages" value="{{old('pages',$book->pages)}}" class="form-control">
                           <small class="form-text text-muted">Page Count</small>
                        </div>

                        <div class="form-group">
                           <label>About</label>
                           <input type="hidden" name="about" value="{{old('about',$book->about)}}">
                           <div name="about2" id="editor">{{old('about2',$book->about)}}</div>
                           <small class="form-text text-muted">Book Summary</small>
                        </div>

                        <select name="author_id">
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                    {{$author->name}} {{$author->surname}}
                                </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-primary">EDIT</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var quill = new Quill('#editor', {theme: 'snow'});
    document.querySelector('#form').onsubmit = () => {
       // document.querySelector('input[name=about]').value = quill.getContents().ops.insert;
       document.querySelector('input[name=about]').value = JSON.stringify(quill.getContents());
    };
</script>
@endsection