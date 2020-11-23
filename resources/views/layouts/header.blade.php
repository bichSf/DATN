<header id="header" class="header" style="background-color: #d8d8d7;">
    <div class="container-fluid">
        <div class="row p10l p10r" style="justify-content: space-between">
            <div class="header-simulation-logo d-none d-md-block">
                <a class="h-100 center-vertically" href="">
                    <img class="logo-header h-90" src="{{ asset('images/HUSTSV.png') }}">
                </a>
            </div>
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
        </div>
    </div>
</header>
