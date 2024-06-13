@extends('dashboard.layouts.main')
@section('title', 'Dashboard | PackingApp')
@section('container')
    <div class="main-content">
        <section class="section">
            <div class="col-md-12" style="margin-top:70px">
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag" id="products-carousel">
                            <div class="owl-stage-outer">
                                <div class="row">
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'produksi')
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-success">
                                                <i class="fas fa-folder-open"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Pesanan Customer</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$pesanancustomerselesai}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-danger">
                                                <i class="fas fa-folder-open"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Pesanan Customer</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$pesanancustomerbelumselesai}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-success">
                                                <i class="fas fa-file-alt "></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Pengadaan Barang </h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$pengadaanbarangselesai}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-danger">
                                                <i class="fas fa-file-alt "></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Pengadaan Barang</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$pengadaanbarangbelumselesai}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
