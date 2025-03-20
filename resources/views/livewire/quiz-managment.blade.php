<div>
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{  'Quiz' }}</flux:heading>
        <flux:subheading>{{ 'Managem quiz' }}</flux:subheading>
        <div class="mt-5 w-full max-w">
            <flux:modal.trigger name="quiz-form">
                <flux:button>Add new</flux:button>
            </flux:modal.trigger>
            <div class="mt-3 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Opration</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizs as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="h-35 max-w-lg rounded-lg" src="{{ asset('storage/'.$item->image) }}" alt="image description">
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->title }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->status)
                                        <flux:badge color="lime">Active</flux:badge>
                                    @else
                                        <flux:badge color="red">Block</flux:badge>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @livewire('form.quiz-form', )
    </div>
</div>