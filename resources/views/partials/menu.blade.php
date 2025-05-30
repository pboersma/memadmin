<div class="d-flex flex-column flex-shrink-0 p-4 text-white bg-dark shadow-sm rounded-end h-100" style="width: 280px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <i class="fa-solid fa-layer-group fa-lg me-2 text-info"></i>
        <span class="fs-4 fw-semibold">MemAdmin</span>
    </a>

    <hr class="text-secondary">

    <ul class="nav nav-pills flex-column gap-1 mb-3">
        <li class="nav-item">
            <a href="{{ route('families.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('families.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                <i class="fa-solid fa-house me-2"></i> Families
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('family_members.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('family_members.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                <i class="fa-solid fa-people-group me-2"></i> Family Members
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('member_types.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('member_types.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                <i class="fa-solid fa-tags me-2"></i> Member Types
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contributions.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('contributions.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                <i class="fa-solid fa-euro-sign me-2"></i> Contributions
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <form action="{{ route('fiscal-year.set') }}" method="POST" class="mb-4">
            @csrf
            <label for="fiscal_year" class="form-label text-white-50 small">Fiscal Year</label>
            <select name="fiscal_year" id="fiscal_year"
                class="form-select form-select-sm bg-dark text-white border-secondary" onchange="this.form.submit()">
                @foreach($fiscalYears as $fiscalYear)
                    <option value="{{ $fiscalYear->year }}"
                        {{ session('fiscal_year') == $fiscalYear->year ? 'selected' : '' }}>
                        {{ $fiscalYear->year }}
                    </option>
                @endforeach
            </select>
        </form>

        <hr class="text-secondary">

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                    class="rounded-circle me-2 shadow-sm">
                <strong>User</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow mt-2">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Sign out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
