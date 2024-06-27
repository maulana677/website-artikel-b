<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:pendaftarans,email',
                'no_telp' => 'required|string|max:20',
                'domisili' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'status_pekerjaan' => 'required|string|max:255',
                'minat_divisi' => 'required|string|in:People Development,Talent Acquisition,Internal Finance dan Eksternal Finance,Community Development,Ambassador Development,Eksternal Relation,Community Partner,Social Media Strategist,Graphic Design,Content Creator,Web Developer,Brand Ambassador,Secretary',
                'upload_cv' => 'required|file|max:2048', // maksimal 2MB, sesuaikan jika diperlukan
                'social_media' => 'required|string|max:255',
                'portofolio' => 'required|string',
                'username' => 'required|string|unique:pendaftarans,username',
            ],
            [
                'nama.required' => 'Name field is required.',
            ]
        );

        // Simpan file CV ke penyimpanan 'public'
        $cvPath = $request->file('upload_cv')->store('cv', 'public');

        // Buat pendaftaran baru dengan data yang valid
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama = $validatedData['nama'];
        $pendaftaran->email = $validatedData['email'];
        $pendaftaran->no_telp = $validatedData['no_telp'];
        $pendaftaran->domisili = $validatedData['domisili'];
        $pendaftaran->tempat_lahir = $validatedData['tempat_lahir'];
        $pendaftaran->tanggal_lahir = $validatedData['tanggal_lahir'];
        $pendaftaran->status_pekerjaan = $validatedData['status_pekerjaan'];
        $pendaftaran->minat_divisi = $validatedData['minat_divisi'];
        $pendaftaran->upload_cv = $cvPath; // simpan path file CV relatif ke 'storage/app/public'
        $pendaftaran->social_media = $validatedData['social_media'];
        $pendaftaran->portofolio = $validatedData['portofolio'];
        $pendaftaran->username = $validatedData['username'];

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
            $pendaftaran = Pendaftaran::findOrFail($id);

            // Hapus CV terkait
            $this->deleteCV($pendaftaran->upload_cv);

            // Hapus pendaftaran
            $pendaftaran->delete();

            return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('error', 'Terjadi kesalahan saat menghapus pendaftaran.');
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
