<aside class="main-sidebar-left nav-side-menu">
    @php($routeIndex = request()->route()->getName())
    <div class="content">
        <div id="jquery-accordion-menu" class="jquery-accordion-menu h-100 w-100" style="padding-top: 20px; box-shadow: unset !important;">
            <div class="jquery-accordion-menu-header fs18">DANH MỤC QUẢN LÝ</div>
            <ul>
                @if($currentUser->isAdmin())
                    <li class="nav-item menu-simulation-item @if($routeIndex == USER_STATISTICAL) active @endif">
                        <a class="fs16" href="{{ route(USER_STATISTICAL) }}"><i class="fa fa-glass"></i>Thống kê dinh dưỡng</a>
                    </li>
                    <li class="nav-item menu-simulation-item @if(in_array($routeIndex, [ADMIN_MANAGER_USER, ADMIN_USER_CREATE, ADMIN_USER_EDIT])) active @endif">
                        <a class="fs16" href="{{ route(ADMIN_MANAGER_USER) }}"><i class="fa fa-glass"></i>Quản lý nhân sự </a>
                    </li>
                    <li class="nav-item menu-simulation-item @if(in_array($routeIndex, [ADMIN_MANAGER_SURVEY, ADMIN_SURVEY_CREATE, ADMIN_SURVEY_EDIT])) active @endif">
                        <a class="fs16" href="{{ route(ADMIN_MANAGER_SURVEY) }}"><i class="fa fa-glass"></i>Quản lý đợt khảo sát</a>
                    </li>
                @else
                    <li class="nav-item menu-simulation-item @if(in_array($routeIndex, [USER_NUTRITION_INDEX, USER_NUTRITION_CREATE])) active @endif">
                        <a class="fs16" href="{{ route(USER_NUTRITION_INDEX) }}"><i class="fa fa-glass"></i>Khảo sát dinh dưỡng</a>
                    </li>
                @endif
                <li class="nav-item menu-simulation-item @if($routeIndex == USER_PROFILE) active @endif">
                    <a class="fs16" href="{{ route(USER_PROFILE) }}"><i class="fa fa-glass"></i>Thông tin cá nhân</a>
                </li>
                <li class="nav-item menu-simulation-item @if($routeIndex == USER_RESET_PASSWORD_INDEX) active @endif">
                    <a class="fs16" href="{{ route(USER_RESET_PASSWORD_INDEX) }}"><i class="fa fa-glass"></i>Thay đổi mật khẩu</a>
                </li>
            </ul>
        </div>
    </div>
</aside>
