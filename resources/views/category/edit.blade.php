@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update {{$category->name}}</div>

                    <daiv class="card-body">
                        <form action="{{route('category.update', ['category' => $category->id])}}" method="post">
                            @method('patch')
                            @csrf
                            @include('error')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $category->name }}" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="name">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </daiv>
                </div>
            </div>
        </div>
    </div>
@endsection
