@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Author</div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.update',[$author])}}">

                        <div class="form-group">
                           <label>Name</label>
                           <input type="text" name="name" value="{{old('name',$author->name)}}" class="form-control">
                           <small class="form-text text-muted">Author Name</small>
                        </div>

                        <div class="form-group">
                           <label>Surname</label>
                           <input type="text" name="surname" value="{{old('surname',$author->surname)}}" class="form-control">
                           <small class="form-text text-muted">Author Surname</small>
                        </div>

                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection