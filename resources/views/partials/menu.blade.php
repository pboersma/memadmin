<div class="d-flex flex-column flex-shrink-0 p-4 text-white bg-dark shadow-sm rounded-end h-100" style="width: 280px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <i class="fa-solid fa-layer-group fa-lg me-2 text-info"></i>
        <span class="fs-4 fw-semibold">MemAdmin</span>
    </a>

    <hr class="text-secondary">

    @php
        $roles = array_map(fn($r) => $r->name, session('roles') ?? []);
    @endphp

    <ul class="nav nav-pills flex-column gap-1 mb-3">
        @if(array_intersect(['secretaris', 'beheerder'], $roles))
            <li class="nav-item">
                <a href="{{ route('families.index') }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('families.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                    <i class="fa-solid fa-house me-2"></i> Families
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('family_members.index') }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('family_members.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                    <i class="fa-solid fa-users me-2"></i> Familieleden
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('member_types.index') }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('member_types.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                    <i class="fa-solid fa-tags me-2"></i> Soorten Leden
                </a>
            </li>
        @endif
        @if(array_intersect(['penningmeester', 'beheerder'], $roles))
            <li class="nav-item">
                <a href="{{ route('contributions.index') }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('contributions.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                    <i class="fa-solid fa-hand-holding-dollar me-2"></i> Contributies
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('discounts.index') }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded-pill {{ request()->routeIs('discounts.index') ? 'bg-primary text-white' : 'text-white text-opacity-75' }}">
                    <i class="fa-solid fa-percent me-2"></i> Contributies Staffels
                </a>
            </li>
        @endif
    </ul>

    <div class="mt-auto">
        <form action="{{ route('fiscal-year.set') }}" method="POST" class="mb-4">
            @csrf
            <label for="fiscal_year" class="form-label text-white-50 small">Fiscal Year</label>
            <select name="fiscal_year" id="fiscal_year"
                class="form-select form-select-sm bg-dark text-white border-secondary" onchange="this.form.submit()">
                @foreach($fiscalYears as $fiscalYear)
                    <option value="{{ $fiscalYear->year }}"
                        {{ session('fiscal_year')->year == $fiscalYear->year ? 'selected' : '' }}>
                        {{ $fiscalYear->year }}
                    </option>
                @endforeach
            </select>
        </form>

        <hr class="text-secondary">

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://avatar.iran.liara.run/public/47" alt="" width="32" height="32"
                    class="rounded-circle me-2 shadow-sm">
                <strong>{{ session('name') }}</strong>
                <br>
                @if(session('roles'))
                    <span class="badge bg-secondary ms-2">
                        {{ session('roles')[0]->name }}
                    </span>
                @endif
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
