<flux:modal name="content-form" class="w-full">
    <form wire:submit.prevent='submit'>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Story form</flux:heading>
                <flux:subheading>Story form.</flux:subheading>
            </div>
                <div class="flex mb-2">
                        <div class="w-full ml-1">
                            <flux:textarea
                            wire:model="text"
                            rows="10"
                            label="Story part"
                            class="w-full"
                            placeholder="Story content..."
                        />
                        </div>
                  </div>
                <flux:input type="file" wire:model="image" label="Image"/>
                @if ($image)
                    <img class="h-35 max-w-lg rounded-lg" src="{{ $image->temporaryUrl() }}" alt="image description">
                @endif
                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
        </div>
    </form>
</flux:modal>