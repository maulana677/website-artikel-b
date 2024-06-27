@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Pendaftaran</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    placeholder="Contoh: Maulana Ikhsan" required>
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Contoh: maul@gmail.com" required>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    value="{{ old('no_telp') }}" placeholder="Contoh: 085267875423" required>
                                @error('no_telp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="domisili">Domisili</label>
                                <input type="text" name="domisili" id="domisili" class="form-control"
                                    value="{{ old('domisili') }}" placeholder="Contoh: Bandar Lampung" required>
                                @error('domisili')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') }}" placeholder="Contoh: Bandar Lampung" required>
                                @error('tempat_lahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status_pekerjaan">Status Pekerjaan</label>
                                <input type="text" name="status_pekerjaan" id="status_pekerjaan" class="form-control"
                                    value="{{ old('status_pekerjaan') }}" placeholder="Contoh: Graphic Design" required>
                                @error('status_pekerjaan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="minat_divisi">Minat Divisi</label>
                                <select name="minat_divisi" id="minat_divisi" class="form-control" required>
                                    <option value="">Pilih Minat Divisi</option>
                                    <option value="People Development"
                                        {{ old('minat_divisi') == 'People Development' ? 'selected' : '' }}>People
                                        Development</option>
                                    <option value="Talent Acquisition"
                                        {{ old('minat_divisi') == 'Talent Acquisition' ? 'selected' : '' }}>Talent
                                        Acquisition</option>
                                    <option value="Internal Finance dan Eksternal Finance"
                                        {{ old('minat_divisi') == 'Internal Finance dan Eksternal Finance' ? 'selected' : '' }}>
                                        Internal Finance dan Eksternal Finance</option>
                                    <option value="Community Development"
                                        {{ old('minat_divisi') == 'Community Development' ? 'selected' : '' }}>Community
                                        Development</option>
                                    <option value="Ambassador Development"
                                        {{ old('minat_divisi') == 'Ambassador Development' ? 'selected' : '' }}>Ambassador
                                        Development</option>
                                    <option value="Eksternal Relation"
                                        {{ old('minat_divisi') == 'Eksternal Relation' ? 'selected' : '' }}>Eksternal
                                        Relation</option>
                                    <option value="Community Partner"
                                        {{ old('minat_divisi') == 'Community Partner' ? 'selected' : '' }}>Community
                                        Partner</option>
                                    <option value="Social Media Strategist"
                                        {{ old('minat_divisi') == 'Social Media Strategist' ? 'selected' : '' }}>Social
                                        Media Strategist</option>
                                    <option value="Graphic Design"
                                        {{ old('minat_divisi') == 'Graphic Design' ? 'selected' : '' }}>Graphic Design
                                    </option>
                                    <option value="Content Creator"
                                        {{ old('minat_divisi') == 'Content Creator' ? 'selected' : '' }}>Content Creator
                                    </option>
                                    <option value="Web Developer"
                                        {{ old('minat_divisi') == 'Web Developer' ? 'selected' : '' }}>Web Developer
                                    </option>
                                    <option value="Brand Ambassador"
                                        {{ old('minat_divisi') == 'Brand Ambassador' ? 'selected' : '' }}>Brand Ambassador
                                    </option>
                                    <option value="Secretary" {{ old('minat_divisi') == 'Secretary' ? 'selected' : '' }}>
                                        Secretary</option>
                                </select>
                                @error('minat_divisi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="upload_cv">Upload CV</label>
                                <input type="file" name="upload_cv" id="upload_cv" class="form-control" required>
                                @error('upload_cv')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="social_media">Social Media</label>
                                <input type="text" name="social_media" id="social_media" class="form-control"
                                    value="{{ old('social_media') }}"
                                    placeholder="Contoh: linkedin.com/in/maulanaikhsan44" required>
                                @error('social_media')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="portofolio">Portofolio</label>
                                <input type="text" name="portofolio" id="portofolio" class="form-control"
                                    placeholder="Contoh: Link Portofolio" required>
                                @error('portofolio')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" placeholder="Contoh: Username Social Media" required>
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
