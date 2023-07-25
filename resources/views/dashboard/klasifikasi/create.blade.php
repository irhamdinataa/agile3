@extends('dashboard.layouts.main')
@section('title', 'Tambah Kode Klasifikasi | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bidang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('klasifikasi.create') }}">Tambah Kode
                            Klasifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Kode Klasifikasi</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('klasifikasi.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                    id="kode" name="kode" value="{{ old('kode') }}" required>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control @error('uraian') is-invalid @enderror"
                                    id="uraian" name="uraian" value="{{ old('uraian') }}" required>
                                @error('uraian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <a href="{{ route('klasifikasi.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
