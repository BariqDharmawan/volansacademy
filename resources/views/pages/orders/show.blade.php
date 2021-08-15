@extends('layouts.admin')
@section('title', 'Detail Transaksi')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Detail Transaksi {{ date('mdHis', strtotime($order->created_at)).$order->id }}</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
	
	
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">Tanggal</div><div class="col-md-10">: {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Status</div>
                    <div class="col-md-10">: {{ $order->status }}</div>
                    @if($order->status == 'pending')
                    @if($order->paymentUrl)
                    <div class="col-md-12"><a class="btn btn-danger pt-0 pb-0" href="{{ $order->paymentUrl }}">Bayar</a></div>
                    @endif
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-2">Jatuh tempo</div><div class="col-md-10">: {{ date('d-m-Y H:i:s', strtotime($order->expired_at)) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered data-table" id="pendingTable">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        @foreach($order->order_details as $item)
                            <td>
                                {{$item->subclass->name}}:{{$item->subclass->sub_name}}
                            </td>
                            <td>
                                {{number_format($item->price)}}
                            </td>
                        @endforeach
                        <tfoot>
                            <tr>
                                <th>Program</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">Subtotal</div><div class="col-md-10">: {{ number_format($order->subtotal) }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Voucher</div><div class="col-md-10">: {{ $order->coupon_code }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Diskon</div><div class="col-md-10">: {{ number_format($order->discount) }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2">Total</div><div class="col-md-10">: {{ number_format($order->total) }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection