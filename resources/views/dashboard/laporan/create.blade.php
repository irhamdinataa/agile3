@extends('dashboard.layouts.main')
@section('title', 'Input Laporan | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Laporan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.create') }}">Input Laporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Laporan</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST" action="{{ route('laporan.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="number" class="form-control @error('npm') is-invalid @enderror" id="npm"
                                    name="npm" value="{{ old('npm') }}">
                                @error('npm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                    id="prodi" name="prodi" value="{{ old('prodi') }}">
                                @error('prodi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dosen">Dosen Pembimbing Lapangan</label>
                                <input type="text" class="form-control @error('dosen') is-invalid @enderror"
                                    id="dosen" name="dosen" value="{{ old('dosen') }}">
                                @error('dosen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Laporan</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jenis1" name="jenis" value="pkpm"
                                        class="custom-control-input" {{ old('jenis') == 'pkpm' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="jenis1">PKPM</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jenis2" name="jenis" value="kp"
                                        class="custom-control-input" {{ old('jenis') == 'kp' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="jenis2">KP</label>
                                </div>
                                @if ($errors->has('jenis'))
                                    <p class="text-danger">{{ $errors->first('jenis') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jurnal">Input Jurnal</label>
                                <input type="file" class="form-control @error('jurnal') is-invalid @enderror"
                                    id="jurnal" name="jurnal" value="{{ old('jurnal') }}"
                                    accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
                                @error('jurnal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="laporan">Input Laporan</label>
                                <input type="file" class="form-control @error('laporan') is-invalid @enderror"
                                    id="laporan" name="laporan" value="{{ old('laporan') }}"
                                    accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
                                @error('laporan')
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
