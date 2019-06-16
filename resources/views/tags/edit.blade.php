@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update {{$tag->tag}}</div>

                    <daiv class="card-body">
                        <form action="{{route('tags.update', ['tag' => $tag->id])}}" method="post">
                            @method('PATCH')
                            @csrf
                            @include('error')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $tag->tag }}" class="form-control  @error('tag') is-invalid @enderror" name="tag" placeholder="tag">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </daiv>
                </div>
            </div>
        </div>
    </div>
@endsection
