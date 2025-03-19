<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">MemAdmin</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('families.index') }}"
                class="nav-link {{ request()->routeIs('families.index') ? 'active' : 'text-white' }}">
                <i class="fa-solid fa-users pe-none me-2"></i>
                Families
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('family_members.index') }}"
                class="nav-link {{ request()->routeIs('family_members.index') ? 'active' : 'text-white' }}">
                <i class="fa-solid fa-user pe-none me-2"></i>
                Family Members
            </a>
        </li>
    </ul>

    <hr>

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->avatar_url ?? 'https://github.com/mdo.png' }}" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>{{ Auth::user()->name ?? 'Guest' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form>
                    @csrf
                    <button class="dropdown-item" type="submit">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
</div>
