<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">E-Arsip</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a class="text-small" href="{{ url('/dashboard') }}">E-Arsip</a>
        </div>
        <ul class="sidebar-menu">
            <li class="">
                <a href="{{ route('dashboard') }}" class=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li>

                <a href="{{ route('suratmasuk.index') }}" class="nav-link"><i class="fas fa-envelope"></i>
                    <span>Surat Masuk</span></a>
            </li>
            <li>

                <a href="{{ route('suratkeluar.index') }}" class="nav-link"><i class="fas fa-envelope-open-text"></i>
                    <span>Surat Keluar</span></a>
            </li>

        </ul>
    </aside>
</div>
