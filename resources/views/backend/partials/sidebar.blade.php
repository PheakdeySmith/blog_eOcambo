<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            eO<span><b>cambo</b></span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body">
        <ul class="nav">
            <!-- Main Section -->
            <li class="nav-item nav-author">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <!-- Fields Section -->
            <li class="nav-item nav-author">Fields</li>
            <li class="nav-item">
                <a href="/authors" class="nav-link {{ request()->routeIs('authors.index') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Authors</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/permissions" class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/roles" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/roles" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Roles</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

