<aside class="main-sidebar-left nav-side-menu">
    @php
        $routeIndex = request()->route()->getName();
    @endphp
    <div class="content">
        <div id="jquery-accordion-menu" class="jquery-accordion-menu h-100 w-100" style="padding-top: 20px">
            <div class="jquery-accordion-menu-header fs18">DANH MỤC QUẢN LÝ</div>
            <ul>
                <li class="@if($routeIndex == USER_PROFILE) active @endif"><a class="fs16" href="{{ route(USER_PROFILE) }}"><i class="fa fa-glass"></i>Thông tin cá nhân</a></li>
                <li class="@if($routeIndex == USER_RESET_PASSWORD_INDEX) active @endif"><a class="fs16" href="{{ route(USER_RESET_PASSWORD_INDEX) }}"><i class="fa fa-glass"></i>Thay đổi mật khẩu</a></li>
                <li class="@if($routeIndex == USER_POPULATION) active @endif"><a class="fs16" href="{{ route(USER_POPULATION) }}"><i class="fa fa-glass"></i>Quản lý dân số</a></li>
                <li class="@if($routeIndex == USER_STATISTICAL) active @endif"><a class="fs16" href="{{ route(USER_STATISTICAL) }}"><i class="fa fa-glass"></i>hống kê dinh dưỡng</a></li>
            </ul>
        </div>
    </div>
</aside>
