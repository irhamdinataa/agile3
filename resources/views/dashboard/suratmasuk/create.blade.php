@extends('dashboard.layouts.main')
@section('title', 'Tambah Divisi | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Divisi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('suratmasuk.index') }}">Surat Masuk</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('suratmasuk.create') }}">Tambah Surat Masuk</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Tambah Surat Masuk</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Surat Masuk</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('suratmasuk.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nomor_surat">No Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                    id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}">
                                @error('nomor_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="asal_surat">Asal Surat</label>
                                <input type="text" class="form-control @error('asal_surat') is-invalid @enderror"
                                    id="asal_surat" name="asal_surat" value="{{ old('asal_surat') }}">
                                @error('asal_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="klasifikasi_id">Klasifikasi</label>
                                <select name="klasifikasi_id" id="klasifikasi_id"
                                    class="form-control @error('klasifikasi_id') is-invalid @enderror">
                                    <option hidden selected disabled value>Pilih Klasifikasi</option>
                                    @foreach ($klasifikasis as $klasifikasi => $id)
                                        <option value="{{ $id }}" @selected(old('klasifikasi_id') == $id)>
                                            {{ $klasifikasi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('klasifikasi_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_surat">Tanggal Surat</label>
                                <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                    id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                                @error('tanggal_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_diterima">Tanggal Diterima</label>
                                <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                    id="tanggal_diterima" name="tanggal_diterima" value="{{ old('tanggal_diterima') }}">
                                @error('tanggal_diterima')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                    id="perihal" name="perihal" value="{{ old('perihal') }}">
                                @error('perihal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                    id="lampiran" name="lampiran" value="{{ old('lampiran') }}" 
                                    accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
                                @error('lampiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">

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
