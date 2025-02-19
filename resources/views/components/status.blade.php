@if (session('status') || 'confirmed' === request('convertkit'))
    <div
        {{ $attributes->merge([
            'class' => 'fixed bottom-0 left-0 right-0 z-10',
            'x-cloak' => true,
            'x-data' => '{ open: false }',
            'x-init' => '$nextTick(() => setTimeout(() => { open = true; setTimeout(() => open = false, 5000) }, 100))',
            'x-show' => 'open',
            'x-transition.duration.500ms' => '',
        ]) }}
    >
        <div class="container mb-4 md:max-w-screen-sm">
            <div class="flex items-center justify-between gap-5 px-5 py-4 text-white bg-gray-800 rounded-lg shadow-lg">
                <p>
                    @if (request('convertkit'))
                        You're all set! Thank you for subscribing!
                    @else
                        {{ session('status') }}
                    @endif
                </p>

                <button class="text-indigo-400" @click="open = false">
                    <span class="sr-only">Close</span>
                    <x-heroicon-o-x-mark class="w-5 h-5 translate-y-[-0.5px]" />
                </button>
            </div>
        </div>
    </div>
@endif
