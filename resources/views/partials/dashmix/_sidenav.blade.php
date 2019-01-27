<div class="content-header justify-content-lg-center">
    <a class="link-fx font-size-lg text-dual" href="index.html">
        <span class="text-white-75">{{ config('core.title_primary') }}</span>
        {{ config('core.title_extension') }}
    </a>
    <div class="d-lg-none">
        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-times-circle"></i>
        </a>
    </div>
</div>
<div class="content-side content-side-full bg-black-10 text-center">
    <button type="button" class="btn btn-sm btn-outline-secondary">
    <i class="fa fa-fw fa-user-circle"></i>
    </button>
    <button type="button" class="btn btn-sm btn-outline-secondary">
    <i class="fa fa-fw fa-pencil-alt"></i>
    </button>
    <button type="button" class="btn btn-sm btn-outline-secondary">
    <i class="fa fa-fw fa-file-alt"></i>
    </button>
    <button type="button" class="btn btn-sm btn-outline-secondary">
    <i class="fa fa-fw fa-cog"></i>
    </button>
</div>
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="nav-main-link-icon si si-bar-chart"></i>
                <span class="nav-main-link-name">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-heading">Manage</li>
        @permission('manage-user')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">User</span>
            </a>
        </li>
        @endpermission
        @permission('manage-role')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('role') ? 'active' : '' }}" href="{{ route('role.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Role</span>
            </a>
        </li>
        @endpermission
        @permission('manage-permission')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('permission') ? 'active' : '' }}" href="{{ route('permission.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Permission</span>
            </a>
        </li>
        @endpermission
        @permission('manage-employee')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('employee') ? 'active' : '' }}" href="{{ route('employee.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Employee</span>
            </a>
        </li>
        @endpermission
        <li class="nav-main-heading">Company Setting</li>
        @permission('manage-schedule')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('schedule') ? 'active' : '' }}" href="{{ route('schedule.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Schedule</span>
            </a>
        </li>
        @endpermission
        @permission('manage-branch')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('branch') ? 'active' : '' }}" href="{{ route('branch.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Branch</span>
            </a>
        </li>
        @endpermission
        @permission('manage-department')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('department') ? 'active' : '' }}" href="{{ route('department.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Department</span>
            </a>
        </li>
        @endpermission
        @permission('manage-designation')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('designation') ? 'active' : '' }}" href="{{ route('designation.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Designation</span>
            </a>
        </li>
        @endpermission
        @permission('manage-employment-type')
        <li class="nav-main-item">
            <a class="nav-main-link {{ Request::is('employment-type') ? 'active' : '' }}" href="{{ route('employment-type.index') }}">
                <i class="nav-main-link-icon far fa-dot-circle"></i>
                <span class="nav-main-link-name">Employment Type</span>
            </a>
        </li>
        @endpermission
    </ul>
</div>
