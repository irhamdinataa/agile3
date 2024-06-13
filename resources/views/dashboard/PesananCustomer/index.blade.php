@extends('dashboard.layouts.main')
@section('title', 'Pesanan Customer | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan Customer</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('PesananCustomer.index') }}">Pesanan Customer</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Pesanan Customer</h4>
                        <div class="card-header-action">
                            <a href="{{ route('PesananCustomer.create') }}" class="btn btn-primary">Tambah Pesanan</a>
                            @if (hasPermissionMenu(['admin']))
                            <a href="{{ route('PesananCustomer.download') }}" class="btn btn-primary">Export PDF</a>
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
                                        <th>Nama Produk</th>
                                        <th>Kebutuhan</th>
                                        <th>Done</th>
                                        <th>To do</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($PesananCustomer as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item['namabarang'] }}</td>
                                            <td>{{ $item['kebutuhan'] }}</td>
                                            <td>{{ $item['done'] }}</td>
                                            <td>{{ $item['todo'] }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="{{ route('PesananCustomer.edit', $item->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('PesananCustomer.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini ?')"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                "targets": [6]
            }]
        });
    </script>
@endpush
