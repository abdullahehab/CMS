@extends('index')


@section('title', 'Edit Post')

@section('header')

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">{{$post->title}}</h1>
                    <p class="lead">{{$post->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->

@endsection

<!-- SECTION -->
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">

                    <div class="section-row">
                        <div class="section-title">
                            <h2 class="title">Edit Post</h2>
                        </div>

                        <form action="{{route('UserPost.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
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
                                </div>

                                <div class="col-md-12">
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
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="input"  value="{{ $post->title }}" name="title" placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input"  name="description" placeholder="description">{{ $post->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" class="img-thumbnail" width="100px" height="100px">
                                        <input type="file" name="featured" class="form-control-file" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
<!-- /SECTION -->
