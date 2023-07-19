@extends('dashboard.layouts.main')
@section('title', 'Edit Surat Keluar | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Surat Keluar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('suratkeluar.index') }}">Surat Keluar</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('suratkeluar.edit', $suratkeluar->id) }}">Edit
                            Pegawai</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Surat Keluar</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Surat Keluar</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST"
                            action="{{ route('suratkeluar.update', $suratkeluar->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                    id="nomor_surat" name="nomor_surat"
                                    value="{{ old('nomor_surat', $suratkeluar->nomor_surat) }}">
                                @error('nomor_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="text" class="form-control @error('dari') is-invalid @enderror"
                                    id="dari" name="dari" value="{{ old('dari', $suratkeluar->dari) }}">
                                @error('dari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kepada">Kepada</label>
                                <input type="text" class="form-control @error('kepada') is-invalid @enderror"
                                    id="kepada" name="kepada" value="{{ old('kepada', $suratkeluar->kepada) }}">
                                @error('kepada')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                    id="perihal" name="perihal" value="{{ old('perihal', $suratkeluar->perihal) }}">
                                @error('perihal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_surat">Tanggal Surat</label>
                                <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                    id="tanggal_surat" name="tanggal_surat"
                                    value="{{ old('tanggal_surat, $suratkeluar->tanggal_surat') }}">
                                @error('tanggal_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="file"
                                    class="form-control @error('lampiran') is-invalid @enderror"
                                    id="lampiran" name="lampiran"
                                    value="{{ old('lampiran') }}" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
                                @error('lampiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <a href="{{ route('suratkeluar.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('after-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
