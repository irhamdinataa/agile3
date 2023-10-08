@extends('dashboard.layouts.main')
@section('title', 'Verifikasi Laporan | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Laporan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('repository.index') }}">Verifikasi Laporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Verifikasi Laporan</h4>
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
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>NPM</th>
                                        <th>Program Studi</th>
                                        <th>Dosen Pembimbing Lapangan</th>
                                        <th>Jurnal</th>
                                        <th>Laporan</th>
                                        @if (hasPermissionMenu(['admin']))
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($laporan as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item['email'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['npm'] }}</td>
                                            <td>{{ $item['prodi'] }}</td>
                                            <td>{{ $item['dosen'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ Storage::url($item->jurnal) }}" target="_blank"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ Storage::url($item->laporan) }}" target="_blank"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <form action="{{ route('verifikasilaporan.update', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('verifikasilaporan.cancel', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menolak data ini ?')"
                                                        class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
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
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush

@push('after-script')
    <!-- JS Libraies -->
    <script src="{{ asset('admin/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        $("#table-1").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [5, 8]
            }]
        });
    </script>
@endpush
