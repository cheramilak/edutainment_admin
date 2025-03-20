<flux:modal name="quiz-form" class="md:w-96">
    <form wire:submit.prevent='submit'>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Quiz form</flux:heading>
                <flux:subheading>Quiz form.</flux:subheading>
            </div>
                <flux:input label="Title" wire:model='title' placeholder="Quiz title" />

                <flux:input type="file" wire:model="image" label="Image"/>

                <flux:checkbox wire:model="status" label="Status" />
                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
        </div>
    </form>
</flux:modal>