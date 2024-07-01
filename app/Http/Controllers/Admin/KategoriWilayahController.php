<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreKategoriWilayahRequest;
use App\Models\KategoriWilayah;
use Illuminate\Http\Request;

class KategoriWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriWilayah = KategoriWilayah::all();
        return view('admin.kategori-wilayah.index', compact('kategoriWilayah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreKategoriWilayahRequest $request)
    {
        $kategoriWilayah = new KategoriWilayah();
        $kategoriWilayah->nama_wilayah = $request->nama_wilayah;
        $kategoriWilayah->save();

        session()->flash("success", "Data Berhasil Dibuat");
        return redirect()->route('kategori-wilayah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoriWilayah = KategoriWilayah::findOrFail($id);
        return view('admin.kategori-wilayah.edit', compact('kategoriWilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoriWilayah = KategoriWilayah::findOrFail($id);
        $kategoriWilayah->nama_wilayah = $request->nama_wilayah;
        $kategoriWilayah->save();

        session()->flash("success", "Kategori berhasil diubah!");
        return redirect()->route('kategori-wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kategoriWilayah = kategoriWilayah::findOrFail($id);
            $kategoriWilayah->delete();
            return response(['status' => 'success', 'message' => 'Kategori wilayah berhasil dihapus']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Kategori wilayah tidak bisa']);
        }
    }
}
