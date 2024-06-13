@extends('dashboard.layouts.main')
@section('title', 'Input Pengadaan Barang | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Pengadaan Barang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('PengadaanBarang.create') }}">Input Pengadaan Barang</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Pengadaan Barang</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST" action="{{ route('PengadaanBarang.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="namabarang">Nama Barang</label>
                                <input type="text" class="form-control @error('namabarang') is-invalid @enderror"
                                    id="namabarang" name="namabarang" value="{{ old('namabarang') }}" min="0">
                                @error('namabarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="0">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">PenanggungJawab</label>
                                <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror"
                                    id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" min="0">
                                @error('penanggung_jawab')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var path = "{{ route('laporan.autocomplete_prodi') }}";
            $("#prodi").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: path,
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            var resp = $.map(data, function(obj) {
                                return obj.nama;
                            });
                            response(resp);
                        }
                    });
                },
                minLength: 1
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var path = "{{ route('laporan.autocomplete_dosen') }}";
            $("#dosen").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: path,
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            var resp = $.map(data, function(obj) {
                                return obj.nama;
                            });
                            response(resp);
                        }
                    });
                },
                minLength: 1
            });
        });
    </script>
@endpush
