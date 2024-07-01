@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kategori Wilayah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('kategori-wilayah.index') }}">Kategori Wilayah</a></div>
                <div class="breadcrumb-item">Tambah Kategori Wilayah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Kategori Wilayah</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat postingan baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Kategori Wilayah</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori-wilayah.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Wilayah</label>
                                    <input name="nama_wilayah" type="text" class="form-control" id="nama_wilayah">
                                    @error('nama_wilayah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </form>
                        </div>
                    </div>
    </section>
@endsection
