<div class="card h-full border-0 shadow">
    <img src="{{ asset('class/'.$subclass->icon) }}" 
    class="card-img-top" alt="{{ $subclass->name }}">
    <div class="card-body text-left">
        <h5 class="card-title mb-4">
            {{ Str::words($subclass->name, 3) }}
        </h5>
        <ul>
            <x-list-icon icon="calendar_today_black_24dp.svg" 
            text="{{ $subclass->created_at->format('D, d M Y') }}" />
            <x-list-icon icon="schedule_black_24dp.svg" 
            text="{{ $subclass->created_at->format('H.i') }}" />
            <x-list-icon icon="language_black_24dp.svg" 
            text="Public" />
            <x-list-icon icon="attach_money_black_24dp.svg" 
            text="Rp. 3.500.000,-" />
        </ul>
    </div>
    <div class="card-footer p-0 bg-transparent rounded-bottom overflow-hidden">
        <a href="{{ route('subcourses', $subclass->id) }}" 
            class="btn btn-warning w-100 rounded-0">
            Click here for registration
        </a>
    </div>
</div>