<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ config('app.name') }}</a>
        </li>
    </ul>
    {{-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.ProfilePage') }}" >
                <i class="fas fa-user"></i> Profile
            </a>
        </li>
    </ul> --}}
</nav>
