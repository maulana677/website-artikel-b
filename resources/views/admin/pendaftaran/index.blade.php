@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Pendaftaran</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pendaftaran</h2>
            <p class="section-lead">
                On this page you can see all the data.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Pendaftaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Telepon</th>
                                            <th>Minat Divisi</th>
                                            <th>Domisili</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Status Pekerjaan</th>
                                            <th>Social Media</th>
                                            <th>Portofolio</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftaran as $pendaftarans)
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ $pendaftarans->nama }}</td>
                                                <td>{{ $pendaftarans->email }}</td>
                                                <td>{{ $pendaftarans->no_telp }}</td>
                                                <td>{{ $pendaftarans->minat_divisi }}</td>
                                                <td>{{ $pendaftarans->domisili }}</td>
                                                <td>{{ $pendaftarans->tempat_lahir }}</td>
                                                <td>{{ $pendaftarans->tanggal_lahir }}</td>
                                                <td>{{ $pendaftarans->status_pekerjaan }}</td>
                                                <td>{{ $pendaftarans->social_media }}</td>
                                                <td>{{ $pendaftarans->portofolio }}</td>
                                                <td>{{ $pendaftarans->username }}</td>
                                                <td>
                                                    <a href="{{ route('pendaftaran.show', $pendaftarans->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('pendaftaran.destroy', $pendaftarans->id) }}"
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
