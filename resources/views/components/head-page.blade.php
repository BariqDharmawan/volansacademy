<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 text-dark font-weight-bold">{{ $title }}</h1>
</div>

<div class="card shadow mb-3">
    <div class="card-body">
        {{ $slot }}
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif