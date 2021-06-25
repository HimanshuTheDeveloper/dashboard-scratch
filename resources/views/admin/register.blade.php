@extends('layouts.master')

@section('title')
     Registered Roles
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Registered Roles</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->usertype}}</td>
                                <td>
                                    <a href="/role-edit/{{$user->id}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="/role-delete/{{ $user->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value=" {{$user->id}}">
                                        <button type="submit" href="/role-delete/{{$user->id}}" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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



@section('scripts')
    
@endsection