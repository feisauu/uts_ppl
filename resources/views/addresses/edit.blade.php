@extends('layouts.app')

@section('title', 'Update Alamat')

@section('content')
    <div class="container">
        <h3>Update Alamat</h3>
        <form method="POST" action="{{ route('address.update', $addressItem->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $addressItem->street }}">
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $addressItem->city }}">
            </div>

            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ $addressItem->province }}">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $addressItem->country }}">
            </div>

            <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $addressItem->postal_code }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
