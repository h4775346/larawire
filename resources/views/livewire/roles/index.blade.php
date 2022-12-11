<div class="container mx-auto px-4">
    <div class="flex justify-end p-4">
        <x-jet-button class="dark:bg-gray-700" wire:click="$emit('openModal', 'roles.create')">{{__('Add Role')}}</x-jet-button>
    </div>
    @if (session()->has('message'))
        <div class="w-full p-4 text-white bg-green-500">
            <strong>
                {{ session('message') }}
            </strong>
        </div>
    @endif


    <div class="relative shadow-md sm:rounded-lg">
        <livewire:roles.table />
    </div>

</div>


