<div class="grid gap-4 grid-cols-1">
    @if(config('flash.display_errors', true) && $errors->any())
        @php($messages = collect($errors->all())->map(fn ($error) => new Tonning\Flash\Message($error, 'error'))->toArray())
        <x-flash::message
            :messages="new Tonning\Flash\MessageBag($messages)"
            level="error"
        />
    @endif

    @foreach(session('tonning.flash.notifications', []) as $level => $levelMessages)
        @foreach($levelMessages->groupBy->title as $messages)
            <x-flash::message
                :messages="$messages"
                :level="$level"
            />
        @endforeach
    @endforeach
</div>

{{ session()->forget('tonning.flash.notifications') }}
