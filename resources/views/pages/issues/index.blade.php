@extends('layouts.admin')
@section('title', 'Issue/Follow Up')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Issue/Follow Up</h1>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('issues.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Issue/Follow Up Baru</span>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card shadow">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Project</th>
								<th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Project</th>
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
            ajax: "{{ route('issues.index') }}",
                columns: [
                    {data: 'id', name: 'id', width:'5%'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });
</script>
@endpush