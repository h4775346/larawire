<div class="p-5 dark:bg-gray-800">
    <form wire:submit.prevent="update">

        <div>
            <x-input-field wire:model="userData.name" label="Name"/>
        </div>

        <div class="mt-5">
            <x-input-field wire:model="userData.email" label="Email"/>
        </div>

        <div class="modal-action">
            <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">Update</x-jet-button>
        </div>

    </form>


</div>
