@extends('dashboard.layouts.main')
@section('title', 'Tambah Kode Klasifikasi | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bidang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('klasifikasi.index') }}">Kode Klasifikasi</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('klasifikasi.edit', $klasifikasi->id) }}">Edit
                            Kode Klasifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Kode Klasifikasi </h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kode Klasifikasi</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST"
                            action="{{ route('klasifikasi.update', $klasifikasi) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                    id="kode" name="kode" value="{{ old('kode', $klasifikasi->kode) }}" required>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control @error('uraian') is-invalid @enderror"
                                    id="uraian" name="uraian" value="{{ old('uraian', $klasifikasi->uraian) }}" required>
                                @error('uraian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('klasifikasi.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
