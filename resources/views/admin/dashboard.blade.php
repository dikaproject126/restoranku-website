@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('css')

@endsection

@section('content')
            <div class="page-title mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h3 class="mb-0">Selamat Datang {{ Auth::user()->fullname }} </h3>
                    </div>
                    <div class="col-12 col-md-6 text-end">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.cetak.laporan') }}" target="_blank" class="btn btn-primary">
                                <i class="bi bi-printer-fill me-2"></i> Cetak Rincian Pendapatan
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="page-content"> 
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldWallet"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pesanan Hari Ini</h6>
                                                <h6 class="font-extrabold mb-0">{{ $todayOrders }}</h6>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card"> 
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldBuy"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pendapatan Hari Ini</h6>
                                                <h6 class="font-extrabold mb-0">{{ 'Rp'. number_format($todayRevenue, 0, ',', '.') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldFolder"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pesanan</h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalOrders }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                                <h6 class="font-extrabold mb-0">{{ 'Rp'. number_format($totalRevenue, 0, ',', '.') }}</h6>
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

@section('script')

@endsection