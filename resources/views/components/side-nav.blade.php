<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-lg has-bg-image min-h-screen">
        <div class="image-wrapper">
            <img
                src="https://user-images.githubusercontent.com/25878302/144499035-2911184c-76d3-4611-86e7-bc4e8ff84ff5.jpg"
                alt="sidebar background"/>
        </div>
        <div class="sidebar-layout">
            <div class="sidebar-header">
        <span style="
                text-transform: uppercase;
                font-size: 15px;
                letter-spacing: 3px;
                font-weight: bold;
              ">Base Dashboard</span>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <x-side-nav-item route="dashboard" icon="ri ri-home-2-line" title="Home"></x-side-nav-item>
                        <x-side-nav-sub-item route="users" icon="ri-group-line" title="Users">
                            <x-side-nav-item  route="users.index" icon="ri-list-ordered" title="All Users"></x-side-nav-item>
                        </x-side-nav-sub-item>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer"><span>Sidebar footer</span></div>
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
