@extends('layouts.admin')
@section('title', 'order')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Kontak Kami</h1>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#addContact">
                Tambah Kontak
            </button>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
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
                                <th>Contact name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->value }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" 
                                    data-target="#{{ Str::slug($contact->name) }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addContact" tabindex="-1" aria-labelledby="addContactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addContactLabel">
                    Add contact
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('pages.our-contact.form', [
                        'action' => route('our-contact.store'),
                        'todo' => 'formTambah'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($contacts as $contact)
<div class="modal fade" id="{{ Str::slug($contact->name) }}" tabindex="-1" aria-labelledby="{{ Str::slug($contact->name) }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="{{ Str::slug($contact->name) }}Label">
                Edit kontak {{ $contact->name }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('pages.our-contact.form', [
                    'action' => route('our-contact.update', $contact->id),
                    'data' => $contact,
                    'todo' => 'formEdit-' . $contact->id
                ])
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
        });
    });
</script>
@endpush