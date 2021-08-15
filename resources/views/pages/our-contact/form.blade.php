<form action="{{ $action }}" method="POST" id="{{ $todo }}">
    @csrf
    @if (isset($data) and $todo == 'formEdit-' . $contact->id)
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
    <div class="form-group">
        <label for="nameContact">Link To</label>
        <div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="link_to_whatsapp_{{ $todo }}" name="link_to" class="custom-control-input" value="whatsapp" 
                @isset($data) @if($contact->platform == 'whatsapp') checked @endif @endisset required>
                <label class="custom-control-label" for="link_to_whatsapp_{{ $todo }}">
                    whatsapp
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="link_to_instagram_{{ $todo }}" name="link_to" class="custom-control-input" value="instagram"
                @isset($data) @if($contact->platform == 'instagram') checked @endif @endisset required>
                <label class="custom-control-label" for="link_to_instagram_{{ $todo }}">
                    instagram
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="link_to_custom_{{ $todo }}" name="link_to" class="custom-control-input" value="custom"
                @isset($data) @if($contact->platform == 'custom') checked @endif @endisset required>
                <label class="custom-control-label" for="link_to_custom_{{ $todo }}">
                    Custom link
                </label>
            </div>
        </div>
    </div>
    <div class="form-group" @if($todo == 'formEdit-' . $contact->id) id="custom-link-prefix-{{ $contact->id }}" @else id="custom-link-prefix-create" @endif 
        style="display: none">
        <input type="url" class="form-control" name="link" 
        @if (isset($data) and $contact->platform == 'custom')
        value="{{ $contact->link }}" required @endif>
        @error('link')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
</form>

@push('scripts')
<script>

    $("[name='link_to']").change(function(){
        switch ($(this).val()) {
            case 'whatsapp':

            case 'instagram':
                $('[name="link"]').prop('required', false);
                $(this).parents("form").find('[id*="custom-link-prefix"]').hide();
                $('').hide();
                break;

            case 'custom':
                $(this).parents("form").find('[id*="custom-link-prefix"]').show();
                $(this).parents("form").find('[name="link"]').prop('required', true);
                $(this).parents("form").find('[name="link"]').val("");
                break;
        }
    });

    $(function () {
        $('.data-table').DataTable();
    });
</script>
@endpush