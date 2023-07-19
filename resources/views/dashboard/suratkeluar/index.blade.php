@extends('dashboard.layouts.main')
@section('title', 'Surat Keluar | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Surat Keluar</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('suratkeluar.index') }}">Surat Keluar</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Surat Keluar</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Surat Keluar</h4>
                        <div class="card-header-action">
                            <a href="{{ route('suratkeluar.create') }}" class="btn btn-primary">Tambah Surat Keluar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Dari</th>
                                        <th>Kepada</th>
                                        <th>Perihal</th>
                                        <th>Tanggal Surat</th>
                                        <th>Lampiran</th>
                                        <th>Waktu Dibuat</th>
                                        <th>Waktu Diperbarui</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suratkeluars as $suratkeluar)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $suratkeluar['nomor_surat'] }}</td>
                                            <td>{{ $suratkeluar['dari'] }}</td>
                                            <td>{{ $suratkeluar['kepada'] }}</td>
                                            <td>{{ $suratkeluar['tanggal_surat'] }}</td>
                                            <td>{{ $suratkeluar['perihal'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ Storage::url($suratkeluar->lampiran) }}" target="_blank"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $suratkeluar['created_at'] }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                {{ $suratkeluar['updated_at'] }}</td>
                                            <td class="text-center" style="white-space: nowrap;"><a
                                                    href="{{ route('suratkeluar.edit', $suratkeluar->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('suratkeluar.destroy', $suratkeluar->id) }}}}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus surat keluar ini ?')"
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
    <script>
        $("#table-1").DataTable({
            "scrollX": true,
            "columnDefs": [{
                "sortable": false,
                "targets": [6, 7, 8]
            }]
        });
    </script>
@endpush
