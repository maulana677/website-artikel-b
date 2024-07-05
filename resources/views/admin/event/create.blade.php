@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('event.index') }}">Event</a></div>
                <div class="breadcrumb-item">Tambah Event</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Event</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat membuat postingan baru dan mengisi semua kolom.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Create Event</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        Event</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="event_date" class="form-control"
                                            value="{{ old('event_date') }}">
                                        @error('event_date')
                                            <p class="text-danger">{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori
                                        Wilayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="kategori_wilayah_id" class="form-control" required>
                                            <option disabled selected>Pilih Wilayah</option>
                                            @foreach ($kategoriWilayah as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_wilayah }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_wilayah_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori
                                        Event</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="kategori_event_id" class="form-control" required>
                                            <option disabled selected>Pilih Jenis Event</option>
                                            @foreach ($kategoriEvent as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_event }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_event_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi" class="summernote">{{ old('deskripsi') }}</textarea>
                                        @if ($errors->has('deskripsi') && empty(old('deskripsi')))
                                            <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control" required>
                                            <option disabled selected>Pilih Status</option>
                                            <option value="gratis">Gratis</option>
                                            <option value="berbayar">Berbayar</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempat" class="form-control"
                                            value="{{ old('tempat') }}">
                                        @error('tempat')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daftar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="daftar" class="form-control"
                                            value="{{ old('daftar') }}">
                                        @error('daftar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Create</button>
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
            $('#image-preview').css({
                'background-image': 'url("")',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush
