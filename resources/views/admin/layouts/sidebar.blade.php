<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Quản lý</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Trang chủ</span>
                    </a>
                </li>

                @can('Xem danh sách bộ môn')
                <li>
                    <a href="{{ route('departments.index') }}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Bộ môn</span>
                    </a>
                </li>
                @endcan

                @hasanyrole('Admin|Trưởng bộ môn')
                <li>
                    <a href="{{ route('users.index') }}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Tài khoản</span>
                    </a>
                </li>
                @endhasanyrole

                @can('Xem danh sách nhãn dán')
                <li>
                    <a href="{{ route('labels.index') }}" class=" waves-effect">
                        <i class="bx bx-label"></i>
                        <span>Nhãn dán</span>
                    </a>
                </li>
                @endcan

                {{-- @can('Xem danh sách công việc') --}}
                <li>
                    <a href="{{ route('tasks.index') }}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Công việc</span>
                    </a>
                </li>
                {{-- @endcan --}}

                @can(['Xem danh sách vai trò', 'Xem danh sách quyền'])
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Cài đặt</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Xem danh sách vai trò')
                        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
                        @endcan
                        @can('Xem danh sách quyền')
                        <li><a href="{{ route('permissions.index') }}">Quyền</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->
