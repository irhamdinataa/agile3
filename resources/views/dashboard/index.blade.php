@extends('dashboard.layouts.main')
@section('title', 'Dashboard | E-Arsip')
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
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-primary">
                                                <i class="fas fa-envelope-open-text "></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total Dokumen</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$dokumen}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-warning">
                                                <i class="fas fa-code-branch "></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total Klasifikasi</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$klasifikasi}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-success">
                                                <i class="fas fa-user "></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Total User</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{$user}}
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
