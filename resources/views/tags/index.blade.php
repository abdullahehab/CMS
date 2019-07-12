@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tags</div>

                    <div class="card-body">

                        @if($tag->count()>0)
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
                            @foreach($tag as $tags)
                                <tr>
                                    <th scope="row">{{ $tags->id }}</th>
                                    <td>{{ $tags->tag }}</td>
                                    <td>
                                        <form action="{{route('tags.edit',['tag' => $tags->id])}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-primary" value="Edit">
                                            </div>

                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('tags.destroy',['tag' => $tags->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center" style="font-weight: bold">No Tags get</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
