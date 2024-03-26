<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
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

    $contacts = Contact::all();
    return view('contact.contact', compact('contacts', 'key'));
}
  
    public function create()
    {
        $key = 'contact';
        $contacts = Contact::all(); // Mendapatkan semua kontak untuk ditampilkan dalam form
        return view('contact.create', compact('contacts', 'key'));
    }


        public function get($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('contact-detail', compact('contacts'));
    }

    public function store(Request $request)
{
    // Validasi data yang masuk
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required'
    ]);

    // Simpan data kontak baru
    $contact = new Contact();
    $contact->first_name = $request->first_name;
    $contact->last_name = $request->last_name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->save();
    
    // Redirect ke halaman indeks kontak dengan flash message
    return redirect()->route('contact.index')
        ->with('success', 'Data berhasil ditambah.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $contact = Contact::find($id);
    $contact->first_name = $request->first_name;
    $contact->last_name = $request->last_name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->save();

    return redirect()->route('contact.index')->with('flash', 'Contact updated successfully');
}


    public function edit($id)
    {
        $contact = Contact::find($id);
        $key = 'contact'; // Menentukan nilai $key sesuai dengan halaman yang sedang aktif
        return view('contact.edit', compact('contact', 'key'));
    }
    

        public function show($id)
    {
        // Temukan kontak berdasarkan ID
        $contact = Contact::findOrFail($id);

        return response()->json($contact);
    }


    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $contacts = Contact::where('first_name', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
                       ->get();

    $key = 'search';

    return view('contact.contact', compact('contacts', 'key'));
}


    public function delete($id)
{
    // Cari alamat berdasarkan ID
    $contact = Contact::findOrFail($id);

    // Hapus alamat
    $contact->delete();

    // Redirect kembali ke halaman index atau halaman lainnya
    return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
}
    
}
