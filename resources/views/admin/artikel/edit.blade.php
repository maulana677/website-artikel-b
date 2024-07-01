@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Edit Artikel</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Artikel</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah data barang masuk.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Artikel</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="gambar" id="image-upload" />
                                        </div>
                                        @error('gambar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sumber
                                        Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="sumber_gambar" class="form-control"
                                            value="{{ $artikel->sumber_gambar }}">
                                        @error('sumber_gambar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul
                                        Artikel</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="judul" class="form-control"
                                            value="{{ $artikel->judul }}">
                                        @error('judul')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi" class="summernote">{{ $artikel->deskripsi }}</textarea>
                                        @if ($errors->has('deskripsi') && empty(old('deskripsi')))
                                            <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        Penulis</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama_penulis" class="form-control"
                                            value="{{ $artikel->nama_penulis }}">
                                        @error('nama_penulis')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        Posting</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="tanggal_posting" class="form-control"
                                            value="{{ old('tanggal_posting', $artikel->tanggal_posting) }}">
                                        @error('tanggal_posting')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="category">
                                            <option>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $artikel->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($artikel->gambar) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
