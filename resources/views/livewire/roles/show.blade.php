<div class="p-5 dark:bg-gray-800">
    <div class="flex items-center bg-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white p-2 rounded-full">
        <h1 class="mx-2"><strong>{{$roleData->name}}</strong></h1>
    </div>
    <ul class="text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white mt-2">
        <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 flex items-center justify-between">
            <span class="mr-2 rtl:ml-2">{{__('Permissions')}}</span>
            <div class="w-full grid grid-cols-1 tablet:grid-cols-2 laptop:grid-cols-3">
                @foreach($roleData->getPermissionNames() as $permission)
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-semibold m-1 px-3 py-1 rounded dark:bg-gray-800 dark:text-gray-300 flex justify-center">
                        {{$permission}}
                    </span>
                @endforeach
            </div>
        </li>
    </ul>

    <div class="modal-action">
        <x-jet-button class="mx-1" wire:click.prevent="$emit('edit',{{$roleData->id}})" >{{__('Edit')}}</x-jet-button>
        <x-jet-danger-button class="mx-1" wire:click.prevent="$emit('delete',{{json_encode([$roleData->id])}})">{{__('Delete')}}
        </x-jet-danger-button>
    </div>

</div>
