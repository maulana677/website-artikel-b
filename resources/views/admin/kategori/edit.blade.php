@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></div>
                <div class="breadcrumb-item">Ubah Kategori</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Ubah Kategori</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat mengubah data barang masuk.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Kategori</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input name="name" value="{{ $category->name }}" type="text" class="form-control"
                                        id="name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option {{ $category->status === 1 ? 'selected' : '' }} value="1">
                                            Aktif
                                        </option>
                                        <option {{ $category->status === 0 ? 'selected' : '' }} value="0">
                                            Tidak Aktif
                                        </option>
                                    </select>
                                    @error('status')
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
