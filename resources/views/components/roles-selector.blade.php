@props(['allRoles'])

<h3 {{ $attributes->class(['mb-4 font-semibold text-gray-900 dark:text-white']) }}>Roles</h3>
<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($allRoles as $role)
        <x-checkbox-group-item wire:model="selectedRoles" value="{{$role->name}}" :role="$role"
                               wire:key="role_{{str_replace(' ','',$role->name)}}"/>
    @endforeach
</ul>
