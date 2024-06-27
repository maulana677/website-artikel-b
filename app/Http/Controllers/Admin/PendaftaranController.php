<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PendaftaranRequest $request)
    {
        // Simpan file CV ke penyimpanan 'public'
        $cvPath = $request->file('upload_cv')->store('cv', 'public');

        // Buat pendaftaran baru dengan data yang valid
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama = $request->nama;
        $pendaftaran->email = $request->email;
        $pendaftaran->no_telp = $request->no_telp;
        $pendaftaran->domisili = $request->domisili;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->status_pekerjaan = $request->status_pekerjaan;
        $pendaftaran->minat_divisi = $request->minat_divisi;
        $pendaftaran->upload_cv = $cvPath; // simpan path file CV relatif ke 'storage/app/public'
        $pendaftaran->social_media = $request->social_media;
        $pendaftaran->portofolio = $request->portofolio;
        $pendaftaran->username = $request->username;

        // Simpan pendaftaran
        $pendaftaran->save();

        session()->flash("success", "Pendaftaran berhasil!");
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Tampilkan halaman detail dengan data pendaftaran
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari pendaftaran berdasarkan ID
            $pendaftaran = Pendaftaran::findOrFail($id);

            // Dapatkan path lengkap dari file CV
            $cvPath = storage_path('app/public/' . $pendaftaran->upload_cv);

            // Hapus file CV menggunakan fungsi unlink
            if (file_exists($cvPath)) {
                unlink($cvPath); // Hapus file dari sistem file server
            }

            // Hapus pendaftaran dari database
            $pendaftaran->delete();

            return response()->json(['status' => 'success', 'message' => 'Pendaftaran berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus pendaftaran'], 500);
        }
    }

    public function downloadCV($id)
    {
        // Cari pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Ambil path file CV dari model
        $cvPath = $pendaftaran->upload_cv;

        // Cek apakah file CV ada
        if (Storage::disk('public')->exists($cvPath)) {
            // Lakukan proses unduh file
            return Storage::disk('public')->download($cvPath);
        } else {
            // Handle jika file CV tidak ditemukan
            return redirect()->back()->with('error', 'CV tidak ditemukan.');
        }
    }
}
