@extends('layouts.admin')
@section('title', 'tutor')
@section('content')
    <x-head-page title="Tutor">
        <a href="{{ route('tutors.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i>
            <span class="text">Tambah tutor Baru</span>
        </a>
    </x-head-page>

    <x-bootstrap-table>
        @include('includes.thead', [
            'tds' => ['Bidang', 'Nama', 'Dari', 'Aksi']
        ])
        @include('includes.thead', [
            'type' => 'tfoot',
            'tds' => ['Bidang', 'Nama', 'Dari', 'Aksi']
        ])
    </x-bootstrap-table>
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
            ajax: "{{ route('tutors.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
                    {data: 'field', name: 'field', width: '30%'},
                    {data: 'name', name: 'name', width: '15%'},
					{data: 'from', name: 'from', width: '20%'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '30%'},
                ]
        });
    });
</script>
@endpush