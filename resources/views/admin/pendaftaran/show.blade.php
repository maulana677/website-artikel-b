@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Pendaftar - ({{ $pendaftaran->nama }})</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Detail Pendaftar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Pendaftar</h2>
            <p class="section-lead mb-3">
                On this page you can see all the data.
            </p>

            <div class="col-12 col-sm-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header mt-3">
                        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}"
                            class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Email</div>
                                <div class="profile-widget-item-value">{{ $pendaftaran->email }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Username</div>
                                <div class="profile-widget-item-value">{{ $pendaftaran->username }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">No Telepon</div>
                                <div class="profile-widget-item-value">{{ $pendaftaran->no_telp }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">{{ $pendaftaran->nama }} <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> {{ $pendaftaran->minat_divisi }}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th>Status Pekerjaan</th>
                                    <th class="text-left">Domisili</th>
                                    <th class="text-left">Tempat Lahir</th>
                                    <th class="text-left">Tanggal Lahir</th>
                                    <th class="text-left">Minat Divisi</th>
                                    <th class="text-left">CV</th>
                                    <th class="text-left">Social Media</th>
                                    <th class="text-left">Portofolio</th>
                                </tr>
                                <tr>
                                    <td>{{ $pendaftaran->status_pekerjaan }}</td>
                                    <td class="text-left">{{ $pendaftaran->domisili }}</td>
                                    <td class="text-left">{{ $pendaftaran->tempat_lahir }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="text-left">{{ $pendaftaran->minat_divisi }}</td>
                                    <td class="text-left">
                                        <a href="{{ route('pendaftaran.download-cv', $pendaftaran->id) }}"
                                            target="_blank">Download CV</a>
                                    </td>
                                    <td class="text-left">{{ $pendaftaran->social_media }}</td>
                                    <td class="text-left">{{ $pendaftaran->portofolio }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
