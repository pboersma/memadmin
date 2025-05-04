<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">MemAdmin</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('families.index') }}"
                class="nav-link {{ request()->routeIs('families.index') ? 'active' : 'text-white' }}">
                Families
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('family_members.index') }}"
                class="nav-link {{ request()->routeIs('family_members.index') ? 'active' : 'text-white' }}">
                Family Members
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('member_types.index') }}"
                class="nav-link {{ request()->routeIs('member_types.index') ? 'active' : 'text-white' }}">
                Member Types
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contributions.index') }}"
                class="nav-link {{ request()->routeIs('contributions.index') ? 'active' : 'text-white' }}">
                Contributions
            </a>
        </li>
    </ul>

    <hr>

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>User</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
</div>
