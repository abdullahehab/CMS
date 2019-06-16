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
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tag as $tags)
                                <tr>
                                    <th scope="row">{{ $tags->id }}</th>
                                    <td>{{ $tags->tag }}</td>
                                    <td>
                                        <a href="{{route('tags.edit',['category' => $tags->id])}}">
                                            Edit
                                        </a>
                                        |
                                        <a href="{{route('tags.destroy',['category' => $tags->id])}}">
                                            Delete
                                        </a>
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
