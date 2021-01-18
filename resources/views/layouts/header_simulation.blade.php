<header id="header" class="header" style="height: 80px">
    <div class="container-fluid">
        <div class="row" style="justify-content: space-between">
            <div class="header-simulation-logo d-none d-md-block">
                <a class="" href="@if($currentUser && $currentUser->isUser()) {{ route(USER_NUTRITION_INDEX) }}
                @elseif($currentUser && $currentUser->isAdmin()) {{ route(USER_STATISTICAL) }} @endif">
                    <img class="logo-header" src="{{ asset('images/banner-bk.png') }}">
                </a>
            </div>
            @if(!$currentUser)
                <div class="header-simulation-right">
                    <nav class="navbar-expand-smk h-100" style="padding-right: 15px">
                        <ul class="navbar-nav h-100 center-vertically">
                            <!-- Dropdown -->
                            <li class="nav-item dropdown h-50">
                                <a class="btn btn-success nav-link text-white h-100 center-vertically p10l p10r"
                                   href="{{ route(USER_LOGIN) }}"
                                   id="navbardrop" data-toggle="tooltip" data-placement="top" title="Đăng nhập">
                                    <span class="name-user text-center text-white">Đăng nhập</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @else
                <div class="header-simulation-right">
                    <nav class="navbar-expand-smk h-100" style="padding-right: 15px">
                        <ul class="navbar-nav h-100">
                            <!-- Dropdown -->
                            <li class="nav-item dropdown h-100">
                                <a class="nav-link text-white h-100 center-vertically" href="{{ route(LOGOUT) }}"
                                   id="navbardrop" data-toggle="tooltip" data-placement="top" title="Đăng xuất"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img class="img-user w50 h50" style="border-radius: 50%" src="{{ $currentUser->avatar ? asset(PATH_AVATAR_USER . $currentUser->avatar) : asset('images/admin.jpeg') }}">
                                    <span class="name-user text-center m10l text-black">{{ $currentUser->name ?? 'Default' }}</span>
                                </a>

                                <form id="logout-form" action="{{ route(LOGOUT) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</header>
