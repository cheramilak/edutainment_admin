<flux:modal name="story-form" class="w-full">
    <form wire:submit.prevent='submit'>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Story form</flux:heading>
                <flux:subheading>Story form.</flux:subheading>
            </div>
                <flux:input label="Title" wire:model='title' placeholder="Story title" />
                <div class="flex mb-2">
                        <div class="w-full ml-1">
                            <flux:textarea
                            wire:model="description"
                            rows="10"
                            label="Description"
                            class="w-full"
                            placeholder="Story description..."
                        />
                        </div>
                  </div>
                <flux:input type="file" wire:model="image" label="Image"/>
                @if ($image)
                    <img class="h-35 max-w-lg rounded-lg" src="{{ $image->temporaryUrl() }}" alt="image description">
                @endif
                <flux:checkbox wire:model="status" label="Status" />
                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
        </div>
    </form>
</flux:modal>