@extends('layouts.master')

@section('title')
    Products
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
                <div class="card-title h2 text-center">All Products </div>
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
                            <th scope="col">Product_Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="/role-edit/{{ $product->id}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="/role-delete/{{ $product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value=" {{$product->id}}">
                                        <button type="submit" href="/role-delete/{{$product->id}}" class="btn btn-danger">Delete</button>
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