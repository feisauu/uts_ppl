@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
<h3>Edit Contact</h3>
<form action="{{ route('contact.update', $contact->id) }}" method="POST">
    @csrf
        <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $contact->first_name }}">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $contact->last_name }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
