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
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Surat Keluar</h4>
                        <div class="card-header-action">
                            <a href="{{ route('suratkeluar.create') }}" class="btn btn-primary">Tambah Surat Keluar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Tujuan Surat</th>
                                        <th>Klasifikasi</th>
                                        <th>Tanggal Surat</th>
                                        <th>Tanggal Catat</th>
                                        <th>Perihal</th>
                                        <th>Lampiran</th>
                                        <th>Pengelola</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suratkeluar as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item['nomor_surat'] }}</td>
                                            <td>{{ $item['tujuan_surat'] }}</td>
                                            <td>{{ $item->klasifikasis->nama }}</td>
                                            <td>{{ $item['tanggal_surat'] }}</td>
                                            <td>{{ $item['tanggal_catat'] }}</td>
                                            <td>{{ $item['perihal'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ Storage::url($item->lampiran) }}" target="_blank"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td>
                                            <td>{{ $item->users->name }}</td>
                                            <td class="text-center" style="white-space: nowrap;"><a
                                                    href="{{ route('suratkeluar.edit', $item->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('suratkeluar.destroy', $item->id) }}}}"
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
    <style>
        #table-1 {
            min-width: 100%;
            /* Atur lebar minimum tabel */
        }
    </style>
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
            "columnDefs": [{
                "sortable": false,
                "targets": [7, 9]
            }]
        });
    </script>
@endpush
