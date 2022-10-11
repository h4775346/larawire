<div class="p-8">
    <form wire:submit.prevent="create">
        @csrf
        <label for="error"
               class="block mb-2 text-sm font-medium {{session()->has('error')?'text-red-700 dark:text-red-500':''}}">Role Name
        </label>
        <input type="text" id="error"
               wire:model="role_name"
               class="@error('role_name')bg-red-50 border border-red-500 text-red-900 placeholder-red-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 focus:ring-red-500 focus:border-red-500 @enderror text-sm rounded-lg dark:bg-gray-700  block w-full p-2.5 "
               placeholder="Error input">
        @error('role_name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror

        <div class="mt-5 flex justify-end">
            <x-jet-button :disabled="$errors->any()">ADD</x-jet-button>
        </div>
    </form>

</div>
