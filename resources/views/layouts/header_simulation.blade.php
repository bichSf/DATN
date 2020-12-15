<header id="header" class="header" style="height: 80px">
    <div class="container-fluid">
        <div class="row" style="justify-content: space-between">
            <div class="header-simulation-logo d-none d-md-block">
                <a class="" href="@if($currentUser && $currentUser->isUser()) {{ route(USER_STATISTICAL) }}
                @elseif($currentUser && $currentUser->isAdmin()) {{ route(ADMIN_MANAGER_USER) }} @endif">
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
                                <a class="nav-link text-white h-100 center-vertically" href="" id="navbardrop" data-toggle="tooltip" data-placement="top" title="Đăng xuất">
                                    <img class="img-user w50" style="border-radius: 50%" src="{{ asset('images/admin.jpeg') }}">
                                    <span class="name-user text-center m10l text-black">{{ \Illuminate\Support\Facades\Auth::user()->profile['user_name'] ?? 'Default' }}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</header>
