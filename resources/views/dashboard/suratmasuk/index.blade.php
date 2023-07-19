@extends('dashboard.layouts.main')
@section('title', 'Surat Masuk | AMS')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Surat Masuk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('suratmasuk.index') }}">Surat Masuk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Surat Masuk Lokpro Media</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Surat Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Tanggal Surat Diterima</th>
                                        <th>Perihal</th>
                                        <th>Lampiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($suratMasuk as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item['nomor_surat'] }}</td>
                                            <td>{{ $item['tanggal_surat'] }}</td>
                                            <td>{{ $item['tanggal_diterima'] }}</td>
                                            <td>{{ $item['perihal'] }}</td>
                                            <td>{{ $item['lampiran'] }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('suratmasuk.edit', $item->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('suratmasuk.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
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
