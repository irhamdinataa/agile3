@extends('dashboard.layouts.main')
@section('title', 'Edit Profile | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('profile.edit', $user) }}">Edit Profile</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Profile</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST" action="{{ route('profile.update', $user) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="foto_profile">Foto Profile</label>
                                @if ($user->foto_profile)
                                    <img id="preview_foto_profile" class="d-block mx-auto mb-3"
                                        src="{{ asset('storage/' . $user->foto_profile) }}" alt="" width="80px"
                                        height="80px">
                                @else
                                    <img id="preview_foto_profile" class="d-block mx-auto mb-3"
                                        src="{{ asset('admin/img/avatar/avatar-1.png') }}" alt="" width="80px"
                                        height="80px">
                                @endif
                                <input type="file" class="form-control @error('foto_profile') is-invalid @enderror"
                                    id="foto_profile" name="foto_profile" value="{{ old('foto_profile') }}"
                                    accept="image/png, image/jpg, image/jpeg">
                                @error('foto_profile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card-footer text-right">
                                <a id="backbutton" href="#" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ asset('Admin/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/modules/jquery-selectric/selectric.css') }}">
@endpush

@push('after-script')
    <script src="{{ asset('Admin/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('Admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('Admin/js/page/forms-advanced-forms.js') }}"></script>
    <script>
        document.getElementById("backbutton").addEventListener("click", function(event) {
            event.preventDefault();

            setTimeout(function() {
                window.history.back();
            }, 500);
        });
    </script>
    <script>
        function previewImage(event, previewId) {
            let reader = new FileReader();
            reader.onload = function() {
                let output = document.getElementById(previewId);
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        let fileInput1 = document.querySelector('input[name="foto_profile"]');
        fileInput1.addEventListener('change', function(event) {
            previewImage(event, 'preview_foto_profile');
        });
    </script>
@endpush
