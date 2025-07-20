<nav class="navbar shadow-sm sticky-top navbar-light bg-light">
    <div class="row justify-content-between w-100">
        <div class="col-auto">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="assets/images/logo_notes.png" width="100" height="auto" alt="">
            </a>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end align-items-center">
                <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>[username]</span>
                    <a type="button" class="btn btn-primary" href="{{ route('logout') }}">
                    Logout
                    <i class="fa fa-sign-in"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
