<ul style="background-color: #212a39" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">{{ __('AMDIN') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @can('Truy cập quản lý người dùng')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Thống kê') }}</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('Quản lý người dùng') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Quyền') }}</a>
                <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('Vai trò') }}</a>
                <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Người dùng') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProperty" aria-expanded="true" aria-controls="collapseProperty">
            <i class="fas fa-home"></i>
            <span>{{ __('Quản lý bài đăng') }}</span>
        </a>
        <div id="collapseProperty" class="collapse" aria-labelledby="headingProperty" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Danh mục') }}</a>
                <a class="collapse-item {{ request()->is('admin/properties') || request()->is('admin/properties/*') ? 'active' : '' }}" href="{{ route('admin.properties.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Bài đăng') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->is('admin/messages') || request()->is('admin/messages') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.messages.index') }}">
            <i class="fas fa-envelope"></i>
            <span>{{ __('Phản hồi') }}</span></a>
        </li>
    <li class="nav-item {{ request()->is('admin/agents') || request()->is('admin/agents') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.agents.edit', auth()->id()) }}">
            <i class="fas fa-cog"></i>
            <span>{{ __('Cập nhật tài khoản') }}</span>
        </a>
    </li>
    @endcan

    @if(auth()->user()->roles()->where('title', 'agent')->count() > 0)
        @can('Truy cập bài đăng')
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProperty" aria-expanded="true" aria-controls="collapseProperty">
                    <i class="fas fa-home"></i>
                    <span>{{ __('Quản lý bài đăng') }}</span>
                </a>
                <div id="collapseProperty" class="collapse" aria-labelledby="headingProperty" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/properties') || request()->is('admin/properties/*') ? 'active' : '' }}" href="{{ route('admin.properties.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Bài đăng') }}</a>
                    </div>
                </div>
            </li>
        @endcan
        <li class="nav-item {{ request()->is('admin/agents') || request()->is('admin/agents') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.agents.edit', auth()->id()) }}">
                <i class="fas fa-cog"></i>
                <span>{{ __('Cập nhật tài khoản') }}</span>
            </a>
        </li>
    @endif
</ul>