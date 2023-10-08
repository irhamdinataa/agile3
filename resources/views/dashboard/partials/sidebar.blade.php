<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">E-Arsip</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a class="text-small" href="{{ url('/dashboard') }}">E-Arsip</a>
        </div>
        <ul class="sidebar-menu">
            @if (hasPermissionMenu(['admin']))
                <li class="{{ hasRoutePrefix('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class=""><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            @endif
            <li class="{{ hasRoutePrefix('laporan') ? 'active' : '' }}">

                <a href="{{ route('laporan.create') }}" class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Input Laporan</span></a>
            </li>
            <li class="{{ hasRoutePrefix('repository') ? 'active' : '' }}">

                <a href="{{ route('repository.index') }}" class="nav-link"><i class="fas fa-folder-open"></i>
                    <span>Repository</span></a>
            </li>
            @if (hasPermissionMenu(['admin']))
                <li class="{{ hasRoutePrefix('users') ? 'active' : '' }}">

                    <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user"></i>
                        <span>Manajemen User</span></a>
                </li>
                <li class="{{ hasRoutePrefix('verifikasi_laporan') ? 'active' : '' }}">
                    <a href="{{ route('verifikasilaporan.index') }}" class="nav-link"><i
                            class="fas fa-check-circle"></i>
                        <span>Verifikasi Laporan</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
@push('after-script')
    <script>
        $(document).ready(function() {
            $('#btn-dropdown').on('click', function(e) {
                e.preventDefault();
                let dropdownMenu = $('.dropdown-menu-side');
                if (!dropdownMenu.hasClass('show')) {
                    dropdownMenu.slideDown(500, function() {
                        dropdownMenu.addClass('show');
                    });
                } else {
                    dropdownMenu.slideUp(500, function() {
                        dropdownMenu.removeClass('show');
                    });
                }
            });
        });
    </script>
@endpush
