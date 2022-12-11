<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-lg has-bg-image min-h-screen">
        <div class="sidebar-layout bg-gray-900 border border-t-0 border-b-0 border-gray-500 shadow-xl">
            <div class="sidebar-header">
        <span style="
                text-transform: uppercase;
                font-size: 15px;
                letter-spacing: 3px;
                font-weight: bold;
              ">{{config('app.name')}}</span>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <x-side-nav-item route="dashboard" icon="ri ri-home-2-line" title="{{__('Home')}}"></x-side-nav-item>
                        <x-side-nav-sub-item route="users" icon="ri-group-line" title="{{__('Users')}}">
                            <x-side-nav-item  route="users.index" icon="ri-list-ordered" title="{{__('All Users')}}"></x-side-nav-item>
                        </x-side-nav-sub-item>
                        <x-side-nav-item route="roles.index" icon="ri ri-shield-user-line" title="{{__('Roles')}}"></x-side-nav-item>

                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer"><span>{{config('app.name')}}</span></div>
        </div>
    </aside>
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">
            {{$slot}}
        </main>
        <div class="overlay"></div>
    </div>
</div>
