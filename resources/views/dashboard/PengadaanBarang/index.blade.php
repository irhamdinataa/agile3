@extends('dashboard.layouts.main')
@section('title', 'Pengadaan Barang | PackingApp')
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
                        <h4>Tabel Pengadaan Barang</h4>
                        <div class="card-header-action">
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'produksi')
                                <a href="{{ route('PengadaanBarang.create') }}" class="btn btn-primary">Request
                                    Pengadaan</a>
                            @endif
                            @if (hasPermissionMenu(['admin']))
                                <a href="{{ route('PengadaanBarang.download') }}" class="btn btn-primary">Export PDF</a>
                            @endif
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
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Status</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($PengadaanBarang as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item['namabarang'] }}</td>
                                            <td>{{ $item['jumlah'] }}</td>
                                            <td>{{ $item['penanggung_jawab'] }}</td>
                                            <td>{{ $item['status'] }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                @if ((auth()->user()->role == 'produksi' && $item->status != 'done') || auth()->user()->role == 'admin')
                                                    <form action="{{ route('PengadaanBarang.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Anda yakin ingin menghapus data ini ?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @elseif (auth()->user()->role == 'pengadaan' && $item->status != 'done')
                                                    <form action="{{ route('PengadaanBarang.verifikasi', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
                "targets": [6]
            }]
        });
    </script>
@endpush
