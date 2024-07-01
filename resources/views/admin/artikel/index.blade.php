@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Artikel</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Artikel</h2>
            <p class="section-lead">
                On this page you can see all the data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>All Artikel</h4>
                            <div class="card-header-action">
                                <a href="{{ route('artikel.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <form action="{{ route('artikel.index') }}" method="GET">
                                            <div class="form-group mb-2">
                                                <h5 for="category">Pilih Kategori:</h5>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Semua Kategori</option>
                                                    @foreach ($kategori as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (request('category') == $category->id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                No
                                            </th>
                                            <th>Gambar</th>
                                            <th>Sumber Gambar</th>
                                            <th>Judul Artikel</th>
                                            <th>Deskripsi</th>
                                            <th>Diposting Oleh</th>
                                            <th>Tanggal Posting</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel as $artikels)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>
                                                    <img src="{{ asset($artikels->gambar) }}" width="100" alt="">
                                                </td>
                                                <td>{{ $artikels->sumber_gambar }}</td>
                                                <td>{{ $artikels->judul }}</td>
                                                <td>{!! $artikels->deskripsi !!}</td>
                                                <td>{{ $artikels->nama_penulis }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($artikels->created_at)->translatedFormat('d F Y H:i') }}
                                                </td>
                                                <td>{{ $artikels->category->name }}</td>
                                                <td>
                                                    <a href="{{ route('artikel.edit', $artikels->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('artikel.destroy', $artikels->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            $('#table').DataTable();

            $('.delete-button').on('click', function() {
                var form = $(this).closest('form');
                if (confirm('Anda yakin ingin menghapus data ini?')) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
