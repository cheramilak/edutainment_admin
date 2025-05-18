<flux:modal name="quiz-form" class="w-full">
    <form wire:submit.prevent='submit'>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Word puzzle form</flux:heading>
            </div>
            <flux:input label="Question" wire:model='question' placeholder="puzle question" />
            <flux:input label="Answer" wire:model='answer' placeholder="puzle answer" />
            <flux:input label="Start Index" wire:model='startIndex' placeholder="" />
            <flux:input label="End Index" wire:model='endIndex' placeholder="" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
