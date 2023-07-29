@extends('dashboard.layouts.main')
@section('title', 'Input Dokumen | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dokumen.create') }}">Input Dokumen</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('dokumen.store') }}"
                            enctype="multipart/form-data">
                            @csrf
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
                                <label for="tanggal_dokumen">Tanggal Dokumen</label>
                                <input type="date" class="form-control @error('tanggal_dokumen') is-invalid @enderror"
                                    id="tanggal_dokumen" name="tanggal_dokumen" value="{{ old('tanggal_dokumen') }}">
                                @error('tanggal_dokumen')
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
                                <a id="backbutton" href="#" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
@push('after-script')
    <script>
        document.getElementById("backbutton").addEventListener("click", function(event) {
            event.preventDefault();

            setTimeout(function() {
                window.history.back();
            }, 500);
        });
    </script>
@endpush