@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if($posts->count()>0)
                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $Post)
                                <tr>
                                    <th scope="row">
                                        <img src="{{ asset($Post->featured) }}" alt="{{ $Post->title }}" class="img-thumbnail" width="100px" height="100px">
                                    </th>
                                    <td>{{ $Post->title }}</td>
                                    <td>
                                        <a href="{{route('post.edit',['category' => $Post->id])}}">
                                            Edit
                                        </a>
                                        |
                                        <a href="{{route('post.destroy',['post' => $Post->id])}}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center" style="font-weight: bold">No Posts</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
