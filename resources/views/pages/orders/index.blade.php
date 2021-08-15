@extends('layouts.admin')
@section('title', 'order')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Transaksi</h1>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
	
	@if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="media-list media-list-hover media-list-divided pl-0 pr-4 mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Menunggu ({{auth()->user()->pendingorders->count()}})</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="false">Sudah dibayar ({{auth()->user()->paidorders->count()}})</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">Tidak dibayar ({{auth()->user()->canceledorders->count()}})</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="card shadow">
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered data-table" id="pendingTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="card shadow">
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered data-table" id="paidTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                <div class="card shadow">
                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered data-table" id="canceledTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Tanggal</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        $('#pendingTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            processing: true,
            serverSide: true,
			pageLength: 25,
            ajax: {
				url : "{{ route('orders.index') }}",
				"data": function(d){
						 d.status = "pending";
					  }
			},
            
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width:'5%'},
                    {data: 'description', name: 'description'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jatuhtempo', name: 'jatuhtempo'},
					{data: 'metodepembayaran', name: 'metodepembayaran'},
                    {data: 'amount', name: 'amount'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
        $('#paidTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            processing: true,
            serverSide: true,
			pageLength: 25,
            ajax: {
				url : "{{ route('orders.index') }}",
				"data": function(d){
						 d.status = "paid";
					  }
			},
            
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width:'5%'},
                    {data: 'description', name: 'description'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jatuhtempo', name: 'jatuhtempo'},
                    {data: 'metodepembayaran', name: 'metodepembayaran'},
					{data: 'amount', name: 'amount'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
        $('#canceledTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            processing: true,
            serverSide: true,
			pageLength: 25,
            ajax: {
				url : "{{ route('orders.index') }}",
				"data": function(d){
						 d.status = "cancel";
					  }
			},
            
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width:'5%'},
                    {data: 'description', name: 'description'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jatuhtempo', name: 'jatuhtempo'},
                    {data: 'metodepembayaran', name: 'metodepembayaran'},
					{data: 'amount', name: 'amount'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });
</script>
@endpush