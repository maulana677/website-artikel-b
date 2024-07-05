@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Kategori Event</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kategori Event</h2>
            <p class="section-lead">
                Di halaman ini Anda dapat melihat semua data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Kategori Event</h4>
                            <div class="card-header-action">
                                <a href="{{ route('kategori-event.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                No
                                            </th>
                                            <th>Nama Event</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoriEvent as $kategoriEvents)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $kategoriEvents->nama_event }}</td>
                                                <td>
                                                    <a href="{{ route('kategori-event.edit', $kategoriEvents->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('kategori-event.destroy', $kategoriEvents->id) }}"
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
