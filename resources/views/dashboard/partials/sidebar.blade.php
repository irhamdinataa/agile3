<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">XYZ</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a class="text-small" href="{{ url('/dashboard') }}">XYZ</a>
        </div>
        <ul class="sidebar-menu">

            <li class="{{ hasRoutePrefix('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (hasPermissionMenu(['admin']))
                <li class="{{ hasRoutePrefix('users') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user"></i>
                        <span>Manajemen User</span></a>
                </li>
            @endif
            @if (hasPermissionMenu(['admin']) || hasPermissionMenu(['produksi']))
            <li class="{{ hasRoutePrefix('PesananCustomer') ? 'active' : '' }}">

                <a href="{{ route('PesananCustomer.index') }}" class="nav-link"><i class="fas fa-folder-open"></i>
                    <span>Pesanan Customer</span></a>
            </li>
            @endif
            <li class="{{ hasRoutePrefix('PengadaanBarang') ? 'active' : '' }}">

                <a href="{{ route('PengadaanBarang.index') }}" class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Pengadaan Barang</span></a>
            </li>
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
