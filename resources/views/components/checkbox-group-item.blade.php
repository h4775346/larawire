@props(['role'])
<li class="flex items-center pl-3 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">

    <input id="role_{{str_replace(' ','',$role->name)}}" type="checkbox"
           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
    {{$attributes}}>
    <label for="role_{{str_replace(' ','',$role->name)}}"
           class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300"><strong>{{$role->name}}</strong></label>

</li>
