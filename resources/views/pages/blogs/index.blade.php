@extends('layouts.admin')
@section('title', 'Blog')
@section('content')
    <x-head-page title="Blog">
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i>
            <span class="text">Tambah blog Baru</span>
        </a>
    </x-head-page>

    <x-bootstrap-table>
        @include('includes.thead', [
            'tds' => ['Judul', 'Aksi']
        ])
        @include('includes.thead', [
            'type' => 'tfoot',
            'tds' => ['Judul', 'Aksi']
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
            ajax: "{{ route('blogs.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', width:'5%'},
                    {data: 'title_ens', name: 'title_ens'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });
</script>
@endpush