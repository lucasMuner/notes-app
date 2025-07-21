<nav class="navbar shadow-sm sticky-top navbar-light bg-light">
    <div class="row justify-content-between w-100">
        <div class="col-auto">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_notes.png') }}" width="100" height="auto" alt="">
            </a>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end align-items-center">
                <span class="me-4"><i class="fa-solid fa-user-circle fa-lg text-primary me-2"></i>{{ session('user.username') }}</span>
                    <a type="button" class="btn btn-primary" href="{{ route('logout') }}">
                    Logout
                    <i class="fa fa-sign-in"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
