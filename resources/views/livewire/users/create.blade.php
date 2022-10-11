<div class="p-5 dark:bg-gray-800">
    <form wire:submit.prevent="create">
        <div class="space-y-4">
            <div>
                <x-input-field type="text" wire:model="userData.name" label="Name"/>
            </div>
            <div>
                <x-input-field type="email" wire:model="userData.email" label="Email"/>
            </div>
            <div>
                <x-input-field type="password" wire:model="userData.password" label="Password"/>
            </div>

            <div>
                <x-input-field type="password" wire:model="userData.password_confirmation" label="Password Confirmation"/>
            </div>


            <x-roles-selector :allRoles="$allRoles" button="Create"/>

        </div>
        <div class="modal-action">
            <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">Create</x-jet-button>
        </div>

    </form>


</div>
