@extends('layouts.admin')
@section('title', 'Pengguna')
@section('content')

    <x-head-page title="Pengguna">
        <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#add-user">
            <i class="fas fa-plus"></i>
            <span class="text">Tambah Pengguna Baru</span>
        </button>
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

    <x-bootstrap-modal id="add-user" title="Tambah user">
        <form action="{{ route('users.store') }}" method="POST" id="add-user">
            @csrf
            <x-bootstrap-input label="Nama" name="name" required />
            <x-bootstrap-input label="Email" type="email" name="email" required />
            <x-bootstrap-input label="Kata Sandi" type="password" 
            name="password" required />
            <x-bootstrap-input label="Konfirmasi Kata Sandi" name="password_confirmation" type="password" required />
            
            <div class="col-12">
                <div class="form-group">
                    <strong>Peran:</strong>
                    <div class="row mx-0">
                        <x-bootstrap-radio label="Superadmin" id="role-superadmin" name="role_id" value="1" required />
                        <x-bootstrap-radio label="Admin" id="role-admin" name="role_id" value="2" required checked />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i>
                <span class="text">Kirim</span>
            </button>
        </form>
    </x-bootstrap-modal>

@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').DataTable();
        @if($errors->any())
            $("#add-user").modal('show');
        @endif
    });
</script>
@endpush