@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>

                    <div class="card-body">

                        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @include('error')

                            <div class="form-group">
                                <label for="categories">Select Category</label>
                                <select class="form-control" id="categories" name="category_id">
                                    @foreach($categories as $category)
                                        <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="categories">Select Tag</label>
                                @foreach($tags as $tag)
                                    <div class="form-check">
                                        <input class="form-check-input" name="tags[]" type="checkbox" id="inlineCheckbox1" value="{{ $tag->id }}">
                                        <label class="form-check-label" for="inlineCheckbox1">
                                            {{ $tag->tag }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{old('title')}}" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Post title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Post description" rows="3">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured">Photo</label>
                                <input type="file" name="featured" class="form-control-file" >
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
