<div class="p-5 dark:bg-gray-800">
    <form wire:submit.prevent="update">
        <div class="space-y-4">
            <div class="flex justify-center">
                @if ($photo)
                    <img class="rounded-full" style="height: 200px" src="{{ $photo->temporaryUrl() }}">
                @else
                    <img class="rounded-full" style="height: 200px" src="{{ $userData->profile_photo_url}}">
                @endif
            </div>

            <div>
                <x-input-field wire:model="photo" label="Profile Photo" type="file" accept="image/*"/>
            </div>

            <div>
                <x-input-field type="text" wire:model="userData.name" label="Name"/>
            </div>
            <div>
                <x-input-field type="email" wire:model="userData.email" label="Email"/>
            </div>

            <x-roles-selector :allRoles="$allRoles"/>

        </div>
        <div class="modal-action">
            <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">Update</x-jet-button>
        </div>

    </form>


</div>
