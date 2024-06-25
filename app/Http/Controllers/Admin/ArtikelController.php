<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreArtikelRequest;
use App\Http\Requests\AdminUpdateArtikelRequest;
use App\Models\Artikel;
use App\Models\Category;
use App\Traits\DeleteImageTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    use DeleteImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::with('category')->get();
        $kategori = Category::all();
        return view('admin.artikel.index', compact('artikel', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.artikel.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreArtikelRequest $request)
    {
        $validatedData = $request->validated();
        // Inisialisasi objek Artikel dengan data dari request
        $artikel = new Artikel();
        $artikel->sumber_gambar = $request->sumber_gambar;
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->nama_penulis = $request->nama_penulis;
        $artikel->tanggal_posting = Carbon::now();
        $artikel->category_id = $request->category;

        // Handle image upload if file exists in request
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('artikel', 'public');
            $artikel->gambar = url('storage/' . $imagePath);
        }

        // Simpan artikel ke dalam database
        $artikel->save();

        session()->flash("success", "Data Berhasil Dibuat");
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $artikel = Artikel::findOrFail($id);
        // return view('articles.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->tanggal_posting = \Carbon\Carbon::parse($artikel->tanggal_posting)->format('Y-m-d');
        $categories = Category::all(); // Mengambil semua kategori untuk dropdown
        return view('admin.artikel.edit', compact('artikel', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateArtikelRequest $request, string $id)
    {
        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('artikel', 'public');
            $artikel->gambar = url('storage/' . $imagePath);
        }

        $artikel->sumber_gambar = $request->sumber_gambar;
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->nama_penulis = $request->nama_penulis;
        $artikel->tanggal_posting = Carbon::now();
        $artikel->category_id = $request->category;

        $artikel->save();

        session()->flash("success", "Data Berhasil Diperbarui");
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $artikel = Artikel::findOrFail($id);

            // Hapus gambar terkait
            $this->deleteImage($artikel->gambar);

            // Hapus artikel
            $artikel->delete();

            return response()->json(['status' => 'success', 'message' => 'Artikel berhasil dihapus']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus artikel'], 500);
        }
    }
}
