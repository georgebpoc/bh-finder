<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">BH Locator and Reservation</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('admin.dashboard') }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}" wire:navigate>
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Nav Item - Boarding-House -->
    <li class="nav-item {{ Nav::isRoute('admin.boarding-house') }}">
        <a class="nav-link" href="{{ route('admin.boarding-house') }}" wire:navigate>
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <span>{{ __('Boarding Houses') }}</span></a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ Nav::isRoute('admin.users') }}">
        <a class="nav-link" href="{{ route('admin.users') }}" wire:navigate>
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>{{ __('Users') }}</span></a>
    </li>

    <!-- Nav Item - Reservations -->
    <li class="nav-item {{ Nav::isRoute('admin.reservations') }}">
        <a class="nav-link" href="{{ route('admin.reservations') }}" wire:navigate>
            <i class="fa-solid fa-bars-progress"></i>
            <span>{{ __('Reservations') }}</span></a>
    </li>

    <!-- Nav Item - Confirmation -->
    <li class="nav-item {{ Nav::isRoute('admin.confirmations') }}">
        <a class="nav-link" href="{{ route('admin.confirmations') }}" wire:navigate>
            <i class="fa fa-check-square" aria-hidden="true"></i>
            <span>{{ __('Confirmations') }}</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
