@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Author</div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.store')}}">

                        <div class="form-group">
                           <label>Name</label>
                           <input type="text" name="name" value="{{old('name')}}" class="form-control">
                           <small class="form-text text-muted">Author Name</small>
                        </div>

                        <div class="form-group">
                           <label>Surname</label>
                           <input type="text" name="surname" value="{{old('surname')}}" class="form-control">
                           <small class="form-text text-muted">Author Surname</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection