@extends('dashboard.layouts.main')
@section('title', 'Repository | E-Arsip')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Repository</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('repository.index') }}">Repository</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Repository</h4>
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
                                        <th>Klasifikasi</th>
                                        <th>Tanggal Dokumen</th>
                                        <th>Tanggal Diterima</th>
                                        <th>Perihal</th>
                                        <th>Lampiran</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Input</th>
                                        @if (hasPermissionMenu(['admin']))
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($dokumen as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item->klasifikasis->kode }}</td>
                                            <td>{{ $item['tanggal_dokumen'] }}</td>
                                            <td>{{ $item['tanggal_diterima'] }}</td>
                                            <td>{{ $item['perihal'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ Storage::url($item->lampiran) }}" target="_blank"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td>
                                            <td>{{ $item->users->name }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                            @if (hasPermissionMenu(['admin']))
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <a href="{{ route('repository.edit', $item->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('repository.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Anda yakin ingin menghapus data ini ?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endif
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
        <?php
        $role = auth()->user()->role;
        ?>
        var role = "<?php echo $role; ?>";
        if (role == 'admin') {
            $("#table-1").DataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [5, 8]
                }]
            });
        } else {
            $("#table-1").DataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [5]
                }]
            });
        }
    </script>
@endpush