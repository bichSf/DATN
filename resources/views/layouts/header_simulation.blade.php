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
                            <a class="nav-link text-white h-100 center-vertically" href="{{ route(USER_LOGIN) }}" id="navbardrop" data-toggle="tooltip" data-placement="top" title="Đăng nhập">
                                <span class="name-user text-center m10l text-black">Đăng nhập</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
