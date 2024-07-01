@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Kategori Wilayah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('kategori-wilayah.index') }}">Kategori Wilayah</a></div>
                <div class="breadcrumb-item">Ubah Kategori Wilayah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Ubah Kategori Wilayah</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah data barang masuk.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Update Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori-wilayah.update', $kategoriWilayah->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input name="nama_wilayah" type="text" class="form-control" id="nama_wilayah"
                                        value="{{ $kategoriWilayah->nama_wilayah }}" required>
                                    @error('nama_wilayah')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
