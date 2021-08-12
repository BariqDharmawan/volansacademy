<form action="{{ $action }}" method="POST" id="{{ $todo }}">
    @csrf
    @if ($todo == 'formEdit-' . $contact->id)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="nameContact">Nama kontak</label>
        <input type="text" name="name" class="form-control" id="nameContact" 
        placeholder="Contoh: whatsapp" required
        value="@isset($data){{ $contact->name }}@endisset">
    </div>
    <div class="form-group">
        <label for="valContact">Value kontak</label>
        <textarea name="value" class="form-control" 
        id="valContact" placeholder="Contoh: 087771406656" 
        rows="1" required>@isset($data){{ $contact->value }}@endisset</textarea>
    </div>
    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
</form>