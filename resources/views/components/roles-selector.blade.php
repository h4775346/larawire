@props(['allRoles','button'=>__("Update")])

<div class="flex justify-between">
    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white @error('selectedRoles') text-red-400 @endError">{{__('Roles')}}</h3>
    <x-jet-button :disabled="$errors->any()" type="submit" class="dark:bg-gray-900">{{$button}}</x-jet-button>
</div>
@error('selectedRoles')
<div class="text-red-400">
    <p>{{$message}}</p>
</div>
@endError
<ul style="display: flex;flex-wrap: wrap" class="items-center w-full d-flex flex-wrap  text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($allRoles as $role)
        <x-checkbox-group-item wire:model="selectedRoles" value="{{$role->name}}" :role="$role"
                               wire:key="role_{{str_replace(' ','',$role->name)}}"/>
    @endforeach
</ul>
