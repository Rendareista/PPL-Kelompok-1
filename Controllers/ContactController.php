<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Menambahkan middleware 'auth' untuk memastikan pengguna harus login sebelum mengakses rute ini
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Fungsi untuk menampilkan formulir pembuatan kontak
    public function create()
    {
        return view('contact.create');
    }

    // Fungsi untuk menyimpan data kontak yang dibuat
    public function store(Request $request)
    {
        // Memeriksa apakah pengguna berhasil masuk
        if (Auth::check()) {
            // Pengguna sedang masuk
            $user = Auth::user();

            // Mengonversi objek pengguna ke instance model User jika diperlukan
            if (!($user instanceof \App\Models\User)) {
                $user = \App\Models\User::find($user->getAuthIdentifier());
            }

            // Memastikan bahwa pengguna memiliki akses ke metode createWithUserId pada model Contact
            if (method_exists(Contact::class, 'createWithUserId')) {
                // Lanjutkan menyimpan data kontak dengan menggunakan createWithUserId
                Contact::createWithUserId([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ], $user);

                // Redirect atau lakukan tindakan lain setelah menyimpan data kontak
                return redirect()->back()->with('success', 'Contact created successfully!');
            } else {
                // Jika metode createWithUserId tidak tersedia pada model Contact, lempar pengecualian
                throw new \Exception('Method createWithUserId is not available.');
            }
        } else {
            // Pengguna tidak masuk, mungkin perlu diarahkan untuk masuk terlebih dahulu
            // Redirect ke halaman masuk atau lakukan tindakan lainnya
            return redirect()->route('login')->with('error', 'You need to login first to create a contact.');
        }
    }
}
