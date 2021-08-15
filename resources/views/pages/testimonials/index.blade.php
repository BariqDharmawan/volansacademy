@extends('layouts.admin')
@section('title', 'Testimonial')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Testimonial</h1>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('testimonial.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Testimonial Baru</span>
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
                        @include('includes.thead', [
                            'tds' => ['Testimonial', 'Nama', 'Dari', 'Aksi']
                        ])
                        @include('includes.thead', [
                            'type' => 'tfoot',
                            'tds' => ['Testimonial', 'Nama', 'Dari', 'Aksi']
                        ])
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
            ajax: "{{ route('testimonial.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
                    {data: 'testimonial', name: 'testimonial', width: '30%'},
                    {data: 'name', name: 'name', width: '15%'},
					{data: 'from', name: 'from', width: '20%'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '30%'},
                ]
        });
    });
</script>
@endpush