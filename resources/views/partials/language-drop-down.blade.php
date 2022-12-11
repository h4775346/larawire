<x-nav.nav-dorpdown :title="__('Language')">
    @foreach(config('app.locales') as $key=>$name)
        <x-nav.nav-dropdown-item href="{{route('locale.update',$key)}}"
                                 class="{{app()->getLocale() == $key ?'text-gray-500 disabled':'cursor-pointer'}}">
            {{$name}}
        </x-nav.nav-dropdown-item>
    @endforeach

</x-nav.nav-dorpdown>
