@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="">
                                <h5 class="font-weight-bold">Cari Barang</h5>
                                <input type="text" class="form-control">
                            </form>
                            <div class="py-4 d-flex justify-content-between align-items-center">
                                <img src="" alt="" class="w-25">
                                <p>Beras</p>
                                <p>30.000</p>
                                <button class="border">+</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-capitalize font-weight-bold">pesanan sekarang</h5>
                            <div class="d-flex mt-4 justify-content-between">
                                <img src="" alt="">
                                <p>Beras</p>
                                <div class="d-flex align-items-center">
                                    <button class="border">-</button>
                                    <span class="border px-2">1</span>
                                    <button class="border">+</button>
                                </div>
                                <span>30.000</span>
                            </div>
                            <div class="d-flex mt-4 justify-content-between">
                                <img src="" alt="">
                                <p>Gula</p>
                                <div class="d-flex align-items-center">
                                    <button class="border">-</button>
                                    <span class="border px-2">1</span>
                                    <button class="border">+</button>
                                </div>
                                <span>10.000</span>
                            </div>
                            <div class="rounded shadow p-3 mt-5">
                                <div class="d-flex justify-content-between">
                                    <input type="text" class="form-control" placeholder="Masukkan Nominal Pembayaran Contoh : 50000">
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <p>Total</p>
                                    <span class="font-weight-bold">30.000</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Kembalian</p>
                                    <span class="font-weight-bold">30.000</span>
                                </div>
                                <button class="btn btn-warning btn-sm w-100 py-2 font-weight-bold shadow">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection