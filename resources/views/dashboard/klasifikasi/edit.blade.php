@extends('dashboard.layouts.main')
@section('title', 'Tambah Kode Klasifikasi | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bidang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('classifications.index') }}">Kode Klasifikasi</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('classifications.edit', $klasifikasi->slug) }}">Edit Kode Klasifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Kode Klasifikasi </h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kode Klasifikasi</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('classifications.update',$klasifikasi) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nama">Nama Kode Bidang</label>
                                <input type="text" class="form-control @error('kode_bidang') is-invalid @enderror"
                                    id="kode_bidang" name="kode_bidang" value="{{ old('kode_bidang') ?? $klasifikasi->kode_bidang }}" required>
                                @error('kode_bidang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Kode Sub Bidang</label>
                                <input type="text" class="form-control @error('kode_sub_bidang') is-invalid @enderror"
                                    id="kode_sub_bidang" name="kode_sub_bidang" value="{{ old('kode_sub_bidang') ??$klasifikasi->kode_sub_bidang  }}" required>
                                @error('kode_sub_bidang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('classifications.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
