@extends('dashboard.layouts.main')
@section('title', 'Edit Pengadaan Barang | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengadaan Barang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('PengadaanBarang.index') }}">Pengadaan Barang</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Pengadaan Barang</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST"
                            action="{{ route('PengadaanBarang.update', $PengadaanBarang->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="namabarang">Nama Barang</label>
                                <input type="text" class="form-control @error('namabarang') is-invalid @enderror"
                                    id="namabarang" name="namabarang" value="{{ old('namabarang', $PengadaanBarang->namabarang) }}" min="0">
                                @error('namabarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', $PengadaanBarang->jumlah) }}" min="0">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">PenanggungJawab</label>
                                <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror"
                                    id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab', $PengadaanBarang->penanggung_jawab) }}" min="0">
                                @error('penanggung_jawab')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <a id="backbutton" href="#" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Update</button>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
