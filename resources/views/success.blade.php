<div class="rounded-md bg-green-50 p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: solid/check-circle -->
            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            @if($title)
                <h3 class="mb-2 text-sm font-bold text-green-800">
                    {{ $title }}
                </h3>
            @endif
            <div class="text-sm text-green-700">
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
