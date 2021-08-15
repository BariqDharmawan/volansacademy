@extends('layouts.admin')
@section('title', 'Pengguna')
@section('content')

    <x-head-page title="Pengguna">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Pengguna Baru</span>
        </a>
    </x-head-page>

    <x-bootstrap-table>
        @include('includes.thead', [
            'tds' => ['Nama', 'Email', 'Peran', 'Aksi']
        ])
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->name }}</td>
                <td>
                    @if ($user->id !== auth()->id())
                    <form action="{{ route(
                        'users.destroy', $user->id
                    ) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            Hapus
                        </button>
                    </form>
                    @endif
                </td>
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