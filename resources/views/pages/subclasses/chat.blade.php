@extends('layouts.admin')
@section('title', 'Detail Class')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Chat Alumni Sub Class {{$subclass->name}}</h1>
    </div>
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('classes.show', $subclass->clas->id) }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
			<a href="{{ route('subclasses.chats.create', $subclass->id) }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Chat Alumni Sub Class Baru</span>
            </a>
        </div>
    </div>
	
	<div class="card shadow">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            processing: true,
            serverSide: true,
			pageLength: 25,
            ajax: "{{ route('subclasses.chats.index', $subclass->id) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width:'5%'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });
</script>
@endpush