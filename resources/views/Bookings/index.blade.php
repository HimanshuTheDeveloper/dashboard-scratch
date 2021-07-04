@extends('layouts.master')

@section('title')
    Bookings 
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
                <div class="card-title h2 text-center">All Bookings </div>
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
                            <th scope="col">User_Id</th>
                            <th scope="col">Product_id</th>
                            <th scope="col">Total_price</th>
                            <th scope="col">Created Time</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">{{$booking->id}}</th>
                                <td>{{$booking->user_id}}</td>
                                <td>{{$booking->product_id}}</td>
                                <td>{{$booking->total_price}}</td>
                                <td>{{$booking->created_at}}</td>
                                <td>
                                    <a href="/role-edit/{{ $booking->id}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="/role-delete/{{ $booking->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value=" {{$booking->id}}">
                                        <button type="submit" href="/role-delete/{{$booking->id}}" class="btn btn-danger">Delete</button>
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