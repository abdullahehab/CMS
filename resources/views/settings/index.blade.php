@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Setting</div>

                    <div class="card-body">

                        <form action="{{route('setting.update')}}" method="post">
                            @csrf
                            @method('patch')
                            @include('error')

                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" value="{{ $settings->blog_name }}" class="form-control  @error('title') is-invalid @enderror" name="blog_name" placeholder="Post title">
                            </div>

                            <div class="form-group">
                                <label for="title">Phone number</label>
                                <input type="text" value="{{ $settings->phone_number }}" class="form-control  @error('title') is-invalid @enderror" name="phone_number" placeholder="Post title">
                            </div>

                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="text" value="{{ $settings->blog_email }}" class="form-control  @error('title') is-invalid @enderror" name="blog_email" placeholder="Post title">
                            </div>

                            <div class="form-group">
                                <label for="title">Address</label>
                                <input type="text" value="{{ $settings->address }}" class="form-control  @error('title') is-invalid @enderror" name="address" placeholder="Post title">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
