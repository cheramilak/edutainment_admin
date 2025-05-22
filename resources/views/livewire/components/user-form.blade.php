<flux:modal name="user-form" class="w-full">
  <form wire:submit.prevent='submit'>
    <div class="space-y-6">
      <div>
        <flux:heading size="lg">User form</flux:heading>
        <flux:subheading>User form.</flux:subheading>
      </div>
      <flux:input label="Name" wire:model='name' placeholder="user name" />
      <flux:input label="Email" wire:model='email' placeholder="...@gmail.com" />
      <flux:input label="Password" wire:model='password' placeholder="*****" />
      <flux:checkbox wire:model="status" label="Status" />
      <div class="flex">
        <flux:spacer />

        <flux:button type="submit" variant="primary">Save changes</flux:button>
      </div>
    </div>
  </form>
</flux:modal>