@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">

                        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            @include('error')

                            <div class="form-group">
                                <label for="categories">Select Category</label>
                                <select class="form-control" id="categories" name="category_id">
                                    @foreach($categories as $category)
                                        @if($category->id == $post->category_id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="categories">Select Tag</label>
                                @foreach($tags as $tag)
                                    <div class="form-check">

                                        <input  class="form-check-input"
                                                @foreach($post->tags as $ta)
                                                    @if($ta->id == $tag->id)
                                                            checked
                                                    @endif
                                                @endforeach
                                                name="tags[]" type="checkbox" id="inlineCheckbox1" value="{{ $tag->id }}"
                                        >

                                        <label class="form-check-label" for="inlineCheckbox1">
                                            {{ $tag->tag }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" value="{{ $post->title }}" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Post title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Post description" rows="3">{{ $post->description }}</textarea>
                            </div>

                            <hr>
                            <h4>photo</h4>
                            <div class="form-group">
                                <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" class="img-thumbnail" width="100px" height="100px">
                                <input type="file" name="featured" class="form-control-file" >
                            </div>

                            <button  type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
