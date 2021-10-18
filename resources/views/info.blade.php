<div class="rounded-md bg-blue-50 p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: solid/information-circle -->
            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            @if($title)
                <h3 class="mb-2 text-sm font-bold text-blue-800">
                    {{ $title }}
                </h3>
            @endif
            <div class="text-sm text-blue-700">
                @if($messages->count() > 1)
                    <ul role="list" class="list-disc pl-5 space-y-1">
                        @foreach($messages as $message)
                            <li>
                                {!! $message->message !!}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>
                        {!! $messages->first()->message !!}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
