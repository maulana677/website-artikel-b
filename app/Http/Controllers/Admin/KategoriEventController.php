<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreKategoriEventRequest;
use App\Http\Requests\AdminUpdateKategoriEventRequest;
use App\Models\KategoriEvent;
use Illuminate\Http\Request;

class KategoriEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriEvent = KategoriEvent::all();
        return view('admin.kategori-event.index', compact('kategoriEvent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreKategoriEventRequest $request)
    {
        $kategoriEvent = new KategoriEvent();
        $kategoriEvent->nama_event = $request->nama_event;
        $kategoriEvent->save();

        session()->flash("success", "Data Berhasil Dibuat");
        return redirect()->route('kategori-event.index');
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
        $kategoriEvent = KategoriEvent::findOrFail($id);
        return view('admin.kategori-event.edit', compact('kategoriEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateKategoriEventRequest $request, string $id)
    {
        $kategoriEvent = KategoriEvent::findOrFail($id);
        $kategoriEvent->nama_event = $request->nama_event;
        $kategoriEvent->save();

        session()->flash("success", "Kategori berhasil diubah!");
        return redirect()->route('kategori-event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kategoriEvent = KategoriEvent::findOrFail($id);
            $kategoriEvent->delete();
            return response(['status' => 'success', 'message' => 'Kategori event berhasil dihapus']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Kategori event tidak bisa']);
        }
    }
}
