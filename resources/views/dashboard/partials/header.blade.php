<div class="navbar-bg" style="height: 72px;"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{auth()->user()->foto_profile ? asset('storage/' . auth()->user()->foto_profile) : asset('admin/img/avatar/avatar-1.png');}}" class="rounded-circle mr-1" />
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="margin-top:21px;">
                <a href="{{route('profile.edit', auth()->user()->id)}}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
                <div class="dropdown-divider"></div>

                <a href="{{route('user.password.edit')}}" class="dropdown-item has-icon"> <i class="fas fa-key"></i> Change Password </a>

                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> <i
                        class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </li>
    </ul>
</nav>
