<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light pl-3"><b>Kanban</b> App</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}"
                        class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Projects</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>