<?php

namespace App\Http\Controllers;

use App\Models\FormApi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmitted;

class FormApiController extends Controller
{
    // Menampilkan daftar form API yang sudah dibuat
    public function index()
    {
        // Mengambil semua API yang dibuat oleh pengguna yang sedang login
        // $formApis = auth()->user()->formApis;

        // return view('form-api.index', compact('formApis'));

        $formApis = FormApi::all(); // Mengambil semua data form API
        return view('dashboard', compact('formApis')); // Mengirimkan data ke view
    }

    /**
     * Menampilkan form untuk membuat form API.
     */
    public function create()
    {
        return view('form-api.create'); // Ganti dengan view yang sesuai
    }

    /**
     * Menyimpan form yang dibuat oleh pengguna.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $api = new FormApi();
        $api->user_id = auth()->id();
        $api->name = $validated['name'];
        $api->api_key = Str::random(32); // Membuat API key yang unik
        $api->save();

        return redirect()->route('form-api.create')->with('success', 'Form API berhasil dibuat!');
    }

    /**
     * Menangani pengiriman form berdasarkan API key.
     */
    public function submitForm(Request $request, $api_key)
    {
        // Mencari form API berdasarkan API key
        $formApi = FormApi::where('api_key', $api_key)->firstOrFail();

        // Validasi data form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // // Kirim email ke pengguna yang terkait dengan API key
        // Mail::to($formApi->user->email)->send(new FormSubmitted($validated));

        // return response()->json(['message' => 'Formulir berhasil dikirim!']);
        // Kirim email
        Mail::to($formApi->user->email)  // Alamat penerima yang tetap
            ->send(new FormSubmitted($validated));  // Pass data formulir

        // return back()->with('success', 'Pesan Anda telah terkirim!');
        // return response()->json(['message' => 'Formulir berhasil dikirim!']);

        // Redirect ke halaman baru yang menampilkan pesan sukses
        return redirect()->route('form-api.success');
    }

    // public function edit(FormApi $formApi)
    // {
    //     return view('form-api.edit', compact('formApi'));
    // }

    public function destroy(FormApi $formApi)
    {
        $formApi->delete();
        return redirect()->route('form-api.list')->with('success', 'Form API berhasil dihapus');
    }
}
