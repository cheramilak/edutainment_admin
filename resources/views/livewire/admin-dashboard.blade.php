<div>
    <div class="flex h-full w-full  rounded-xl mb-2">

        <div class="flex h-full w-full flex-1 flex-col gap-0 rounded-xl">

            @include('livewire.components.user-chart')

        </div>
    </div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-max gap-4 md:grid-cols-3 lg:grid-cols-4">
            @php
                $cards = [
                    ['label' => 'Student', 'count' => $student, 'icon' => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0 17.9 17.9 0 0 1-7.5 1.65 17.9 17.9 0 0 1-7.5-1.65Z'],
                    ['label' => 'Parent', 'count' => $parent, 'icon' => 'M9.6 3H5.25A2.25 2.25 0 0 0 3 5.25v4.3c0 .6.24 1.17.66 1.59l9.58 9.58a1.875 1.875 0 0 0 2.61.33 18.1 18.1 0 0 0 5.22-5.22 1.875 1.875 0 0 0-.33-2.61L11.16 3.66A2.25 2.25 0 0 0 9.6 3Z'],
                    ['label' => 'Student', 'count' => $student, 'icon' => 'M18 7.5v9m-4.25-13a3.375 3.375 0 1 1-6.75 0A3.375 3.375 0 0 1 13.75 3ZM3 19.2v-.11a6.375 6.375 0 0 1 12.75 0v.11A12.3 12.3 0 0 1 9.37 21c-2.33 0-4.51-.64-6.37-1.76Z'],
                    ['label' => 'Quiz', 'count' => $quiz, 'icon' => 'M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h16.5m0 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6'],
                    ['label' => 'Story', 'count' => $story, 'icon' => 'M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z'],
                    ['label' => 'Word puzzle', 'count' => $word, 'icon' => 'M18 7.5v9m-4.25-13a3.375 3.375 0 1 1-6.75 0A3.375 3.375 0 0 1 13.75 3ZM3 19.2v-.11a6.375 6.375 0 0 1 12.75 0v.11A12.3 12.3 0 0 1 9.37 21c-2.33 0-4.51-.64-6.37-1.76Z'],
                    ['label' => 'Spelling puzzle', 'count' => $spelling, 'icon' => 'M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z'],
                ];
            @endphp

            @foreach ($cards as $card)
                <div
                    class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 dark:bg-gray-800 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-500 dark:text-gray-400 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}" />
                    </svg>
                    <a href="#">
                        <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $card['label'] }}
                        </h5>
                    </a>
                    <p class="font-normal text-gray-500 dark:text-gray-400">
                        {{ number_format($card['count']) }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>