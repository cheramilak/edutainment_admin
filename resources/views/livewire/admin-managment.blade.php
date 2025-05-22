<div>
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{  'Admin' }}</flux:heading>
        <flux:subheading>{{ 'Managem admins' }}</flux:subheading>
        <div class="mt-5 w-full max-w">
            <flux:button wire:click='add'>Add new</flux:button>
            <div class="mt-3 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
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
                        @foreach ($users as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->email }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->status)
                                        <flux:badge color="lime">Active</flux:badge>
                                    @else
                                        <flux:badge color="red">Block</flux:badge>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <flux:button variant="primary" wire:click="edit('{{ $item->id }}')">Edit</flux:button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.components.user-form')

</div>