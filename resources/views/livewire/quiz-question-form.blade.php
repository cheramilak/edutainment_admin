<div>
    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{"Question form" }}</flux:heading>
        <div class="m-3 p-2 w-full max-w">
            <div class="mt-3 relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="p-2" wire:submit.prevent='save' action="">
                    <div class="flex mb-2">
                        <div class="w-full ml-1">
                            <flux:textarea
                            wire:model="question"
                            rows="10"
                            label="Question"
                            class="w-full"
                            placeholder="quiz questions..."
                        />
                        </div>
                        </div>
                    </div>
                    <flux:input  type="file" wire:model="image" label="Image"/>
                    @if ($image)
                        <img class="h-30 max-w-lg rounded-lg" src="{{ $image->temporaryUrl() }}" alt="image description">
                    @endif
                    @include('livewire.components.option-item')
                    <div class="flex mt-3">
                            <div class="max-md">
                            <flux:select wire:model="answer" >
                                <flux:select.option >Select answer ...</flux:select.option>
                                @foreach ($options as $index => $item)
                                    <flux:select.option  value="{{ $index+1 }}">option {{ $index+1 }}</flux:select.option>
                                @endforeach
                            </flux:select>
                            </div>
                            <flux:spacer />
                            <flux:checkbox  wire:model="status" label="Status" />
                            <flux:spacer />
                    </div>

                    <div class="flex m-4">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>