@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Book</div>
                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}">

                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="book_title" value="{{old('book_title')}}" class="form-control">
                           <small class="form-text text-muted">Book Title</small>
                        </div>

                        <div class="form-group">
                           <label>ISBN</label>
                           <input type="text" name="book_isbn" value="{{old('book_isbn')}}" class="form-control">
                           <small class="form-text text-muted">Book ISBN</small>
                        </div>

                        <div class="form-group">
                           <label>Pages</label>
                           <input type="text" name="book_pages" value="{{old('book_pages')}}" class="form-control">
                           <small class="form-text text-muted">Page Count</small>
                        </div>

                        <div class="form-group">
                           <label>About</label>
                           <textarea type="text" name="book_about" value="{{old('book_about')}}" class="form-control" id="summernote"></textarea>
                           <small class="form-text text-muted">Book Summary</small>
                        </div>

                        <select name="author_id">
                            @foreach ($authors as $author)
                               <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> -->
@endsection