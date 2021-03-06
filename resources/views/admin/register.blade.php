@extends('layouts.master')

@section('title')
     Registered Roles
@endsection

@section('extra_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title h2 text-center">Registered Roles</div>
                @if (session('status'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table  id="example" class="table table-striped table-bordered" style="width:100%">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection