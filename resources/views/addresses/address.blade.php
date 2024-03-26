@extends('layouts.app')
@section('title', 'Address')
@section('content')
@if (session('flash'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('flash')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
@endif
<h3>Halaman Address</h3>
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary" href="/create-address" role="button"><i class="bi bi-person-fill-add"></i> Tambahkan Data</a>
    </div>
</div>
<table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Street</th>
        <th scope="col">City</th>
        <th scope="col">Province</th>
        <th scope="col">Country</th>       
        <th scope="col">Postal Code</th>
        <th scope="col">Contact ID</th> <!-- Tambahkan kolom Contact ID -->
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($address as $idx => $addressItem)
        <tr>
            <th scope="row">{{ ++$idx }}</th>
            <td>{{ $addressItem->street }}</td>
            <td>{{ $addressItem->city }}</td>
            <td>{{ $addressItem->province }}</td>
            <td>{{ $addressItem->country }}</td>   
            <td>{{ $addressItem->postal_code }}</td>
            <td>{{ $addressItem->contact_id }}</td> <!-- Tampilkan Contact ID -->
            <td>
            <a href="{{ route('address.edit', $addressItem->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            <a href="{{ route('address.delete', $addressItem->id) }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

            </td>
          </tr> 
        @endforeach
    </tbody>
  </table>  
  <nav aria-label="Page navigation example">
    <ul class="pagination float-right">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
@endsection
