<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreEventRequest;
use App\Models\Event;
use App\Models\KategoriEvent;
use App\Models\KategoriWilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::with('kategoriWilayah')->get();
        return view('admin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriWilayah = KategoriWilayah::all();
        $kategoriEvent = KategoriEvent::all();
        return view('admin.event.create', compact('kategoriWilayah', 'kategoriEvent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreEventRequest $request)
    {
        // Inisialisasi objek Event dengan data dari request
        $event = new Event();
        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->kategori_wilayah_id = $request->kategori_wilayah_id;
        $event->kategori_event_id = $request->kategori_event_id;
        $event->status = $request->status ?? 'gratis'; // Set default status
        $event->deskripsi = $request->deskripsi;
        $event->tempat = $request->tempat;
        $event->daftar = $request->daftar;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event', 'public');
            $event->image = url('storage/' . $imagePath);
        }

        // Simpan event ke dalam database
        $event->save();

        session()->flash("success", "Data Berhasil Dibuat");
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $kategoriWilayah = KategoriWilayah::all();
        $kategoriEvent = KategoriEvent::all();
        return view('admin.event.edit', compact('event', 'kategoriWilayah', 'kategoriEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            // Simpan image baru
            $imagePath = $request->file('image')->store('event', 'public');
            $event->image = url('storage/' . $imagePath);
        }

        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->kategori_wilayah_id = $request->kategori_wilayah_id;
        $event->kategori_event_id = $request->kategori_event_id;
        $event->status = $request->status ?? 'gratis'; // Set default status
        $event->deskripsi = $request->deskripsi;
        $event->tempat = $request->tempat;
        $event->daftar = $request->daftar;

        $event->save();

        session()->flash("success", "Data berhasil diubah");
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $event = Event::findOrFail($id);

            // Hapus gambar terkait
            $this->deleteImage($event->image);

            // Hapus event
            $event->delete();

            return response()->json(['status' => 'success', 'message' => 'Event berhasil dihapus']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus event'], 500);
        }
    }
}
