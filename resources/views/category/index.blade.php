@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <form action="{{route('category.edit',['category' => $category->id])}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-primary" value="Edit">
                                            </div>

                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('category.destroy',['category' => $category->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                                            </div>

                                        </form>
                                    </td>

                                    {{--                                    <td>--}}
{{--                                        <a href="{{route('category.edit',['category' => $category->id])}}">--}}
{{--                                            Edit--}}
{{--                                        </a>--}}
{{--                                        |--}}
{{--                                        <a href="{{route('category.destroy',['category' => $category->id])}}">--}}
{{--                                            Delete--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
