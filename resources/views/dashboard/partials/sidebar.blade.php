<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">AMS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AMS</a>
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
            <li>

                <a href="{{ route('notadinas.index') }}" class="nav-link"><i class="fas fa-sticky-note"></i>
                    <span>Nota Dinas</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a></li>
                    <li><a class="nav-link" href="{{ route('company.index') }}">Perusahaan</a></li>
                    <li><a class="nav-link" href="{{ route('divisi.index') }}">Divisi</a></li>
                    <li><a class="nav-link" href="{{ route('bidang.index') }}">Bidang</a></li>
                    <li><a class="nav-link" href="{{ route('sub-bidang.index') }}">Sub Bidang</a></li>
                    <li><a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a></li>
                    <li><a class="nav-link" href="{{ route('classifications.index') }}">Kode Klasifikasi</a></li>
                    <li><a class="nav-link" href="{{ route('pokok-kegiatan.index') }}">Pokok Kegiatan</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
