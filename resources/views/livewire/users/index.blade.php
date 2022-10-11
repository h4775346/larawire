<div class="container mx-auto p-4 lg:p-10">
    <div class="px-2 flex justify-end py-3 my-3">
        <x-jet-button class="dark:bg-gray-700" wire:click="$emit('openModal','users.create')">Create</x-jet-button>
    </div>
    <livewire:users.table/>
</div>
