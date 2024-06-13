@extends('dashboard.layouts.main')
@section('title', 'Ubah Password | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Change Password</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.password.edit') }}">Ubah Password</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST" action="{{ route('user.password.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    id="current_password" name="current_password" value="{{ old('current_password') }}">
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
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
