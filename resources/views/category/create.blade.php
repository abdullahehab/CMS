@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            @include('error')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{old('name')}}" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Post title">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
