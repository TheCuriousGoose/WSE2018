<meta name="nav-items-route" content="{{ route('nav-items') }}">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">Main nav</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Pre-orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Design Symbols</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
