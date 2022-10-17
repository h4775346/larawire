@props(['route','icon','title'])
<li class="menu-item sub-menu {{Route::is($route . '.*')?'open':''}} ">
    <a><span class="menu-icon"><i class="{{$icon??'ri-question-mark'}}"></i></span><span
            class="menu-title">{{$title??''}}</span></a>
    <div class="sub-menu-list">
        <ul>
            {{$slot}}
        </ul>
    </div>


</li>
