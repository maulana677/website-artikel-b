@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Event</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Event</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Semua Event</h4>
                            <div class="card-header-action">
                                <a href="{{ route('event.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        {{--  <form action="{{ route('artikel.index') }}" method="GET">
                                            <div class="form-group mb-2">
                                                <h5 for="category">Pilih Kategori:</h5>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Semua Kategori</option>
                                                    @foreach ($kategori as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (request('category') == $category->id) selected @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </form>  --}}
                                    </div>
                                </div>
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                No
                                            </th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Tanggal Event</th>
                                            <th>Wilayah</th>
                                            <th>Jenis Event</th>
                                            <th>Status</th>
                                            <th>Deskripsi</th>
                                            <th>Tempat</th>
                                            <th>Daftar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event as $events)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>
                                                    <img src="{{ asset($events->image) }}" width="100" alt="">
                                                </td>
                                                <td>{{ $events->title }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($events->event_date)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ $events->kategoriWilayah->nama_wilayah }}</td>
                                                <td>{{ $events->kategoriEvent->nama_event }}</td>
                                                <td>{{ $events->status }}</td>
                                                <td>{!! $events->deskripsi !!}</td>
                                                <td>{{ $events->tempat }}</td>
                                                <td>{{ $events->daftar }}</td>
                                                <td>
                                                    <a href="{{ route('event.edit', $events->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('event.destroy', $events->id) }}"
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
