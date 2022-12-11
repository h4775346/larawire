<div class="p-5 dark:bg-gray-800">
    <form wire:submit.prevent="update">

        <div class="space-y-4">

            <div>
                <x-input-field type="text" wire:model="roleData.name" label="{{__('Name')}}"/>
            </div>

            <div class="modal-action">
                <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">{{__('Update')}}</x-jet-button>
            </div>

            <div class="flex justify-between">
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white @error('selectedPermissions') text-red-400 @endError">
                    Permissions</h3>
            </div>
            @error('selectedPermissions')
            <div class="text-red-400">
                <p>{{$message}}</p>
            </div>
            @endError
            <ul style="display: flex;flex-wrap: wrap"
                class="items-center w-full d-flex flex-wrap  text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach($allPermissions as $permission)
                    <x-checkbox-group-item wire:model="selectedPermissions" value="{{$permission->name}}"
                                           :role="$permission"
                                           wire:key="role_{{str_replace(' ','',$permission->name)}}"/>
                @endforeach
            </ul>
        </div>
        <div class="modal-action">
            <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">{{__('Update')}}</x-jet-button>
        </div>

    </form>


</div>
