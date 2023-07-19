@extends('dashboard.layouts.main')
@section('title', 'Bidang | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kode Klasifikasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('classifications.index') }}">Kode Klasifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kode Klasifikasi</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Kode Klasifikasi</h4>
                        <div class="card-header-action">
                            <a href="{{ route('classifications.create') }}" class="btn btn-primary">Tambah Kode Klasifikasi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Kode Bidang</th>
                                        <th>Nama Kode Sub Bidang</th>
                                        <th>Waktu Dibuat</th>
                                        <th>Waktu Diperbarui</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($klasifikasis  as $klasifikasi)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $klasifikasi['kode_bidang'] }}</td>
                                            <td>{{ $klasifikasi['kode_sub_bidang'] }}</td>
                                            <td class="text-center">{{ $klasifikasi['created_at'] }}</td>
                                            <td class="text-center">{{ $klasifikasi['updated_at'] }}</td>
                                            <td class="text-center"><a href="{{ route('classifications.edit',  $klasifikasi) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('classifications.destroy',  $klasifikasi->slug) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus kode klasifikasi ini ?')"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ asset('Admin/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush

@push('after-script')
    <!-- JS Libraies -->
    <script src="{{ asset('Admin/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('Admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('Admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('Admin/js/page/modules-datatables.js') }}"></script>
@endpush
