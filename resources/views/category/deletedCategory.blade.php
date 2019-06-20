@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if($categories->count()>0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name}}</td>
                                            <td>
                                                <a href="{{route('category.restore',['category' => $category->id])}}">
                                                    Restore
                                                </a>
                                                |
                                                <a href="{{ route('category.hdelete',['category' => $category->id]) }}">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center" style="font-weight: bold">No Deleted Categories</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
