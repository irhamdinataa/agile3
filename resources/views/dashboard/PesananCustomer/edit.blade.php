@extends('dashboard.layouts.main')
@section('title', 'Edit Pesanan Customer | PackingApp')
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
                        <h4>Edit Pesanan Customer</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="needs-validation" method="POST"
                            action="{{ route('PesananCustomer.update', $PesananCustomer->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="namabarang">Nama Barang</label>
                                <select name="namabarang" id="namabarang"
                                    class="form-control @error('namabarang') is-invalid @enderror">
                                    <option hidden selected disabled value>Pilih Nama Barang</option>
                                    <option value="roti kering a butter" @selected($PesananCustomer->namabarang == 'roti kering a butter')>
                                        Roti Kering A Butter</option>
                                    <option value="roti kering a cheese" @selected($PesananCustomer->namabarang == 'roti kering a cheese')>
                                        Roti Kering A Cheese</option>
                                    <option value="roti kering b butter" @selected($PesananCustomer->namabarang == 'roti kering b butter')>
                                        Roti Kering B Butter</option>
                                    <option value="roti kering b cheese" @selected($PesananCustomer->namabarang == 'roti kering b cheese')>
                                        Roti Kering B Cheese</option>
                                </select>
                                @error('namabarang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kebutuhan">Kebutuhan</label>
                                <input type="number" class="form-control @error('kebutuhan') is-invalid @enderror"
                                    id="kebutuhan" name="kebutuhan"
                                    value="{{ old('kebutuhan', $PesananCustomer->kebutuhan) }}" min="0">
                                @error('kebutuhan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="done">Done</label>
                                <input type="number" class="form-control @error('done') is-invalid @enderror"
                                    id="done" name="done" value="{{ old('done', $PesananCustomer->done) }}"
                                    min="0">
                                @error('done')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="todo">To do</label>
                                <input type="number" class="form-control @error('todo') is-invalid @enderror"
                                    id="todo" name="todo" value="{{ old('todo', $PesananCustomer->todo) }}"
                                    min="0">
                                @error('todo')
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
@push('after-script')
    <script>
        document.getElementById("backbutton").addEventListener("click", function(event) {
            event.preventDefault();

            setTimeout(function() {
                window.history.back();
            }, 500);
        });
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
