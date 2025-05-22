<div>
    <div class="flex h-full w-full  rounded-xl mb-2">

        <div class="flex h-full w-full flex-1 flex-col gap-0 rounded-xl">

            @include('livewire.components.user-chart')

        </div>
    </div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-max gap-4 md:grid-cols-3 lg:grid-cols-4">
            <div
                class="relative w-100  bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Student</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($student) }}</p>
            </div>
            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Parent</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($parent) }}</p>
            </div>
            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Student</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($student) }}</p>
            </div>
            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Quiz</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($quiz) }}</p>
            </div>
            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Story</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($story) }}</p>
            </div>

            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Word puzzle
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($word) }}</p>
            </div>

            <div
                class="relative bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                </svg>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Spelling puzzle
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ number_format($spelling) }}</p>
            </div>
        </div>

    </div>