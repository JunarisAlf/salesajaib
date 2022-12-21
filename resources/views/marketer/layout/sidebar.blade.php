<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href={{route('sales.dashboard')}}>
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Menu</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#properti" aria-expanded="false"
                aria-controls="properti">
                <i class="menu-icon mdi mdi-home"></i>
                <span class="menu-title">Properti</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="properti">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.showAllProperty')}}>Lihat semua properti</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Akun</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#akun" aria-expanded="false" aria-controls="akun">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="akun">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.profile.index')}}> Lihat Profil </a></li>
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.profile.update')}}> Update Profil </a></li>
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.profile.updatePictView')}}> Update Foto Profil </a></li>
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.profile.updatePWView')}}> Update Password </a></li>
                    <li class="nav-item"> <a class="nav-link" href={{route('sales.logout')}}> Sign Out </a></li>
                </ul>
            </div>
        </li>
        
    </ul>
</nav>
