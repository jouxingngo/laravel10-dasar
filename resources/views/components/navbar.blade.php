<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex justify-content-between w-100">
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}"
                                    href="{{ route('students.index') }}">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('classes*') ? 'active' : '' }}"
                                    href="{{ route('classes.index') }}">Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('extracurriculars*') ? 'active' : '' }}"
                                    href="{{ route('extracurriculars.index') }}">Extracurricular</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}"
                                    href="{{ route('teachers.index') }}">Teacher</a>
                            </li>

                        </ul>
                    </div>
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a onclick="return confirm('Logout?')" href="{{ route('auth.logout') }}" class="nav-link">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endauth

    </div>
</nav>
