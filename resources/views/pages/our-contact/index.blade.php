@extends('layouts.admin')
@section('title', 'order')
@section('content')

    <x-head-page title="kontak kami">
        <button type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#addContact">
                Tambah Kontak
        </button>
    </x-head-page>

    <x-bootstrap-table>
        @include('includes.thead', [
            'tds' => ['Contact name', 'Value', 'Link', 'Action']
        ])
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ Str::words($contact->value, 5) }}</td>
                <td>
                    <a href="{{ $contact->link }}" target="_blank">
                        {{ $contact->link }}
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#edit{{ Str::slug($contact->name) }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#delete{{ Str::slug($contact->name) }}">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </x-bootstrap-table>

    <x-bootstrap-modal id="addContact" title="Add contact">
        @include('pages.our-contact.form', [
            'action' => route('our-contact.store'),
            'todo' => 'formTambah'
        ])
    </x-bootstrap-modal>

    @foreach ($contacts as $contact)
        <x-bootstrap-modal id="delete{{ Str::slug($contact->name) }}" 
        body-class="d-flex align-items-center justify-content-between" 
        title="Hapus kontak {{ $contact->name }}">
            <p class="m-0">
                Kamu yakin ingin menghapus kontak 
                <strong>{{ $contact->name }}</strong>
            </p>
            <form action="{{ route('our-contact.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Hapus
                </button>
            </form>
        </x-bootstrap-modal>

        <x-bootstrap-modal id='edit{{ Str::slug($contact->name) }}' 
        title='Edit kontak {{ $contact->name }}'>
            @include('pages.our-contact.form', [
                'action' => route('our-contact.update', $contact->id),
                'data' => $contact,
                'todo' => 'formEdit-' . $contact->id
            ])
        </x-bootstrap-modal>
    @endforeach

@endsection