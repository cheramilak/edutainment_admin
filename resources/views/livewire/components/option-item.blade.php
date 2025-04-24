@foreach ($options as $index => $option)
    <div class="flex item-center">
        <div class="w-full ml-1 mb-1">
            <flux:input label="Option {{ $index + 1}}" wire:model="options.{{ $index }}.opt" placeholder="option.." />
        </div>
        <flux:badge  wire:click="removeOptions({{ $index }})" color="red">
            <flux:badge.close size="sm" />
        </flux:badge>
    </div>
@endforeach

<div class="flex mt-2 mb-2">
    <flux:button type="button" wire:click="addOptions" color="green">Add new</flux:button>
 </div>