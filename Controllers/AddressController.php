<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Contact; // Import model Contact

class AddressController extends Controller
{
    // Fungsi untuk menampilkan formulir pembuatan alamat
    public function create()
    {
        return view('address.create');
    }

    // Fungsi untuk menyimpan data alamat yang dibuat
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'contact_id' => 'required', // Tambahkan validasi untuk contact_id
        ]);

        // Membuat alamat baru menggunakan model Address
        $address = Address::create([
            'street' => $request->street,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        // Mengaitkan address dengan contact yang sesuai
        $contact = Contact::find($request->contact_id); // Mengambil contact berdasarkan ID yang diberikan
        $contact->addresses()->save($address); // Menyimpan address dalam relasi addresses milik contact

        // Redirect atau lakukan tindakan lain setelah menyimpan data alamat
        return redirect()->back()->with('success', 'Address created successfully!');
    }
}
