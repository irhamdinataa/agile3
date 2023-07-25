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
            <li class="{{ hasRoutePrefix('dokumen') ? 'active' : '' }}">

                <a href="{{ route('dokumen.create') }}" class="nav-link"><i class="fas fa-file-alt"></i>
                    <span>Input Dokumen</span></a>
            </li>
            <li class="{{ hasRoutePrefix('repository') ? 'active' : '' }}">

                <a href="{{ route('repository.index') }}" class="nav-link"><i class="fas fa-folder-open"></i>
                    <span>Repository</span></a>
            </li>
            @if (hasPermissionMenu(['admin']))
                <li class="{{ hasRoutePrefix('klasifikasi') ? 'active' : '' }}">

                    <a href="{{ route('klasifikasi.index') }}" class="nav-link"><i class="fas fa-code-branch"></i>
                        <span>Klasifikasi</span></a>
                </li>
                <li class="{{ hasRoutePrefix('users') ? 'active' : '' }}">

                    <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user"></i>
                        <span>Manajemen User</span></a>
                </li>
                <li class="dropdown">
                    <a id="btn-dropdown-report" href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-check-circle"></i>
                        <span>Verifikasi</span></a>

                    <ul
                        class="dropdown-menu dropdown-menu-side {{ Str::contains(Request::path(), 'verifikasi') ? 'show' : '' }}">
                        <li class="{{ hasRoutePrefix('verifikasi_user') ? 'active' : '' }}"><a class="nav-link " href="{{ route('verifikasiuser.index') }}">User</a></li>
                        <li class="{{ hasRoutePrefix('verifikasi_dokumen') ? 'active' : '' }}"><a class="nav-link " href="{{ route('verifikasidokumen.index') }}">Dokumen</a></li>
                    </ul>
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
