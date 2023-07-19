@extends('dashboard.layouts.main')
@section('title', 'Edit Surat Masuk | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Divisi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('suratmasuk.index') }}">Surat Masuk</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('suratmasuk.create') }}">Edit Surat
                            Masuk</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Surat Masuk</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Surat Masuk</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST"
                            action="{{ route('suratmasuk.update', $suratMasuk->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nomor_surat">No Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                    id="nomor_surat" name="nomor_surat"
                                    value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}">
                                @error('nomor_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_surat">Tanggal Surat</label>
                                <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                    id="tanggal_surat" name="tanggal_surat"
                                    value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat) }}">
                                @error('tanggal_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_diterima">Tanggal Surat Diterima</label>
                                <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                    id="tanggal_diterima" name="tanggal_diterima"
                                    value="{{ old('tanggal_diterima', $suratMasuk->tanggal_diterima) }}">
                                @error('tanggal_diterima')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                    id="perihal" name="perihal" value="{{ old('perihal', $suratMasuk->perihal) }}">
                                @error('perihal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
                                    id="lampiran" name="lampiran" value="{{ old('lampiran', $suratMasuk->lampiran) }}">
                                @error('lampiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <a href="{{ route('suratmasuk.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
