@props(['route'=>''])
<li>
    <a href="{{route($route)}}" aria-current="page"
       class="@if(request()->route()->named($route)) dark:text-white text-gray-900 font-bold @else text-gray-700  dark:text-gray-400 @endIf  block py-2  ltr:pr-4 ltr:pl-3 rtl:pl-4 rtl:pr-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
        {{$slot}}
    </a>
</li>
