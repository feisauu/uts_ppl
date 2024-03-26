<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Contact;

use App\Http\Controllers\Controller;

class AddressController extends Controller
{
   // Di dalam controller
   public function index(Request $request)
{
    $key = '';
    if ($request->is('home')) {
        $key = 'home';
    } elseif ($request->is('address')) {
        $key = 'address';
    } elseif ($request->is('contact')) {
        $key = 'contact';
    }

    $address = Address::all();
    return view('addresses.address', compact('address', 'key'));
}
   // AddressController.php

 
    public function create()
    {
        $contacts = Contact::all();
        $key = 'address';
        $contactId = ''; // Inisialisasi dengan nilai kosong agar tidak ada yang terpilih secara default
        return view('addresses.create', compact('contacts', 'contactId', 'key'));
    }

   
   
    public function store(Request $request)
{
    $request->validate([
        'street' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'postal_code' => 'required',
        'contact_id' => 'required|exists:contacts,id',
    ]);

    $address = new Address();
    $address->street = $request->street;
    $address->city = $request->city;
    $address->province = $request->province;
    $address->country = $request->country;
    $address->postal_code = $request->postal_code;
    $address->contact_id = $request->contact_id;
    $address->save();

    return redirect()->route('address.index')
        ->with('success', 'Data berhasil ditambah.');
}


public function update(Request $request, $id)
{
    $request->validate([
        'street' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'postal_code' => 'required',
    ]);

    $address = Address::findOrFail($id);
    $address->street = $request->street;
    $address->city = $request->city;
    $address->province = $request->province;
    $address->country = $request->country;
    $address->postal_code = $request->postal_code;
    $address->save();

    return redirect()->route('address.index')
        ->with('success', 'Data berhasil diupdate.');
}

public function show($id)
{
    $address = Address::findOrFail($id);
    return response()->json($address);
}

public function edit($id)
{
    $addressItem = Address::findOrFail($id);
    $key = 'address';
    return view('addresses.edit', compact('addressItem', 'key'));
}

    public function delete($id)
{
    // Cari alamat berdasarkan ID
    $address = Address::findOrFail($id);

    // Hapus alamat
    $address->delete();

    // Redirect kembali ke halaman index atau halaman lainnya
    return redirect()->route('address.index')->with('success', 'Address deleted successfully');
}
}
