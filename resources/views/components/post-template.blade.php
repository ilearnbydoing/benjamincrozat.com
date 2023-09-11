<div {{ $attributes->except('post') }}>
    <div class="flex items-start gap-6 lg:gap-8">
        <div class="flex-grow">
            <p class="font-bold">
                <a
                    href="{{ route('media-kit') }}#write"
                    class="text-orange-400 underline"
                >
                    {{ $title }}
                </a>
            </p>

            <p class="mt-2">{{ $description }}</p>

            <div class="h-[1rem] w-1/2 mt-4 mb-2 bg-gray-200/50"></div>
        </div>

        <a
            href="{{ route('media-kit') }}#write"
            class="flex-shrink-0"
        >
            <img src="{{ fake()->imageUrl() }}" class="object-cover aspect-square w-[64px] lg:w-[96px] h-[64px] lg:h-[96px]" />
        </a>
    </div>

    <ul class="flex gap-1 mt-4">
        <li>
            <a
                href="{{ route('media-kit') }}#write"
                class="inline-block px-2 py-1 text-xs font-bold leading-normal text-white uppercase transition-opacity rounded bg-gradient-to-r from-orange-400 to-yellow-400 hover:opacity-75"
            >
                Sponsored
            </a>
        </li>

        <li>
            <span
                class="inline-block px-2 py-1 text-xs font-bold leading-normal text-white uppercase transition-opacity rounded cursor-default bg-gray-200/50 hover:opacity-75"
            >
                <span class="opacity-0">Category</span>
            </span>
        </li>
    </ul>
</div>
