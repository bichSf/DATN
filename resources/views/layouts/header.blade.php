<header id="header" class="header" style="height: 80px">
    <div class="container-fluid">
        <div class="row" style="justify-content: space-between">
            <div class="header-simulation-logo d-none d-md-block">
                <a class="" href="">
                    <img class="logo-header" src="{{ asset('images/banner-bk.png') }}">
                </a>
            </div>
            <div class="header-simulation-right">
                <nav class="navbar-expand-smk h-100" style="padding-right: 15px">
                    <ul class="navbar-nav h-100">
                        <!-- Dropdown -->
                        <li class="nav-item dropdown h-100">
                            <a class="nav-link text-white h-100 center-vertically" href="{{ route(LOGOUT) }}"
                               id="navbardrop" data-toggle="tooltip" data-placement="top" title="Đăng xuất"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img class="img-user w50" style="border-radius: 50%" src="{{ asset('images/admin.jpeg') }}">
                                <span class="name-user text-center m10l text-black">{{ $currentUser->profile['user_name'] ?? 'Default' }}</span>
                            </a>

                            <form id="logout-form" action="{{ route(LOGOUT) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
