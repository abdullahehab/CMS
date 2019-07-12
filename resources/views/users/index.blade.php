@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if($users->count()>0)
                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
{{--                                    <th scope="row">--}}
{{--                                        <img src="#" alt="{{ $user->name }}" class="img-thumbnail" width="100px" height="100px">--}}
{{--                                    </th>--}}
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if($user->admin == 0 )
                                            <a href="{{ route('user.makeAdmin', ['id' => $user->id]) }}">
                                                Make admin
                                            </a>
                                        @else
                                            <a href="{{ route('user.deleteAdmin', ['id' => $user->id]) }}">
                                                Delete admin
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('user.edit',['user' => $user->id])}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-primary" value="Edit">
                                            </div>

                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('user.destroy',['user' => $user->id])}}" method="post">
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
                            <p class="text-center" style="font-weight: bold">No Users</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
