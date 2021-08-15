@extends('layouts.admin')
@section('title', 'Peran')
@section('content')
    <x-head-page title="Peran">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i>
            <span class="text">Tambah Peran Baru</span>
        </a>
    </x-head-page>

    <x-bootstrap-table>
        @include('includes.thead', [
            'tds' => ['Nama']
        ])
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </x-bootstrap-table>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
		$('.data-table').DataTable();
    });
</script>
@endpush