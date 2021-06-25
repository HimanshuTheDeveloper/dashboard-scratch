@extends('layouts.master')

@section('title')
    Edit Registered Roles
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Role For Registered User</h5>
                    </div>
                    <div class="card-body">
                        <form action="/role-register-update/{{$users->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="username">Name ( Current-Usertype :- {{$users->usertype}})</label>
                              <input type="text" class="form-control" name="name" id="username" value="{{ $users->name}}">
                            </div>
                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text"  name="phone" class="form-control" id="phone" value="{{ $users->phone}}">
                            </div> 
                            <div class="row">
                                <div class="form-group col-sm-4">
                                <label for="usertype">Give Role</label>
                                <select name="usertype" class="form-control">
                                    <option value="admin">Admin</aoption>
                                    <option value="vendor">Vendor</option>
                                    <option value="user">User</option>
                                </select>
                                </div>       
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/role-register" class="btn btn-secondary">Cancle</a>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    
@endsection