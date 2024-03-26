@extends('layouts.app')
@section('title', 'Tambah Alamat')

@section('content')
    <h3>Tambah Alamat</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('address.store') }}" method="POST">
        @csrf
                <div class="form-group">
            <label for="contact_id">Kontak</label>
            <select class="form-control" id="contact_id" name="contact_id">
                <option value="">Pilih Kontak</option>
                @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}" {{ $contactId == $contact->id ? 'selected' : '' }}>{{ $contact->first_name }} {{ $contact->last_name }}</option>
                 @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="street">Jalan</label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>
        <div class="form-group">
            <label for="city">Kota</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="province">Provinsi</label>
            <input type="text" class="form-control" id="province" name="province" required>
        </div>
        <div class="form-group">
            <label for="country">Negara</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Kode Pos</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
