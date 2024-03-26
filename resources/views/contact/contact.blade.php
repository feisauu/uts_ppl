@extends('layouts.app')
@section('title', 'Contact')
@section('content')
@if (session('flash'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('flash')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
@endif
<h3>Halaman Contact</h3>
    <div class="row">
        <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ route('contact.create') }}" role="button"><i class="bi bi-person-fill-add"></i> Tambahkan Data</a>
        <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="{{ route('contact.search') }}">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
</form>

        </div>
    </div>
<table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>       
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @php
    $idx = 0;
@endphp

@if(isset($contacts))
    @foreach ($contacts as $contact)
        <tr>
            <th scope="row">{{++$idx}}</th>
            <td>{{$contact->first_name}}</td>
            <td>{{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>
            <td>
                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="{{ route('contact.delete', $contact->id) }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
            </td>
        </tr>
    @endforeach
@endif
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
