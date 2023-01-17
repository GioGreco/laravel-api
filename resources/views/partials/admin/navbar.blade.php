<nav id="admin-navbar" class="d-flex align-items-center">
    <ul class="nav justify-content-around">
        <li class="nav-item d-flex">
            <a class="d-flex justify-content-center align-items-center" href="{{ route('admin.projects.index') }}">
                <div class="home-projects-list d-flex justify-content-center align-items-center {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}">
                    <div class="unset-div d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-list fa-lg fa-fw"></i>
                    </div>
                    <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                    </div>
                    <span class="nav-item-name">Projects List</span>
                </div>
            </a>
        </li>
        <li class="nav-item d-flex">
            <a class="d-flex justify-content-center align-items-center" href="{{ route('admin.projects.create') }}">
                <div class="home-projects-list d-flex justify-content-center align-items-center {{ Route::currentRouteName() == 'admin.projects.create' ? 'active' : '' }}">
                    <div class="unset-div d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-plus fa-lg fa-fw"></i>
                    </div>
                    <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                    </div>
                    <span class="nav-item-name">New Project</span>
                </div>
            </a>
        </li>
        <li class="nav-item d-flex">
            <a class="d-flex justify-content-center align-items-center" href="{{route('admin.categories.index')}}">
                <div class="home-projects-list d-flex justify-content-center align-items-center {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                    <div class="unset-div d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-folder-open fa-lg fa-fw"></i>
                    </div>
                    <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                    </div>
                    <span class="nav-item-name">Categories</span>
                </div>
            </a>
        </li>
        <li class="nav-item d-flex">
            <a class="d-flex justify-content-center align-items-center" href="{{route('admin.tags.index')}}">
                <div class="home-projects-list d-flex justify-content-center align-items-center {{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}">
                    <div class="unset-div d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-bookmark fa-lg fa-fw"></i>
                    </div>
                    <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                    </div>
                    <span class="nav-item-name">Tags</span>
                </div>
            </a>
        </li>
        <li class="nav-item d-flex">
            <a class="d-flex justify-content-center align-items-center" href="#">
                <div class="home-projects-list d-flex justify-content-center align-items-center">
                    <div class="unset-div d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-users fa-lg fa-fw"></i>
                    </div>
                    <div class="unset-div-2 d-flex flex-column justify-content-end align-items-center p-5">
                    </div>
                    <span class="nav-item-name">Users</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
