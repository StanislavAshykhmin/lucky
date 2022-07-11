<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand text-center pb-3 pt-3" href="/">
        {{config('app.name')}}
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="fw-bold">{{Auth::user()->name}}</div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item @routeactive('admin.users.index')">
                <a class="sidebar-link" href="{{route('admin.users.index')}}">
                    <i class="fas fa-fw fa-user-tie"></i> <span class="align-middle">Users</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
