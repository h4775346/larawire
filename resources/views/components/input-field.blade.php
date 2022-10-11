@props(['label'=>''])
<label for="{{$attributes->get('wire:model','id')}}"
       class="@error($attributes->get('wire:model','name')) text-red-700 dark:text-red-500 @enderror block mb-2 text-sm text-gray-800 dark:text-gray-100 font-medium'">
    {{$label}}
</label>
<input {{$attributes->merge()}} type="text" id="{{$attributes->get('wire:model','id')}}"
       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error($attributes->get('wire:model','name')) bg-red-50 focus:border-red-500 border-red-500 dark:bg-red-100 dark:border-red-400 text-red-900 placeholder-red-700 focus:ring-red-500 dark:text-gray-900 @enderror "
       placeholder="{{$label}}">
@error($attributes->get('wire:model','name'))
<p class="mt-2 text-sm text-red-600 dark:text-red-500">
{{$message}}
@enderror
