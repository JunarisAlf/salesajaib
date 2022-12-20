<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
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
                    <li class="nav-item"> <a class="nav-link" href="/admin/properti/tambah-properti">Tambah Properti</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/properti/list-properti">Lihat semua properti</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#marketing" aria-expanded="false"
                aria-controls="marketing">
                <i class="menu-icon mdi mdi-human-greeting"></i>
                <span class="menu-title">Tim Marketing</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="marketing">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/admin/marketing/list-marketing">Lihat semua anggota</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#penjualan" aria-expanded="false"
                aria-controls="penjualan">
                <i class="menu-icon mdi mdi-chart-areaspline"></i>
                <span class="menu-title">Penjualan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="penjualan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/penjualan/tambah-data-penjualan">Tambah data penjualan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/penjualan/riwayat-penjualan">Lihat riwayat penjualan</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="/admin/profil/lihat"> Lihat Profil </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/profil/edit"> Update Profil </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/admin/sign-out"> Sign Out </a></li>
                </ul>
            </div>
        </li>
        
    </ul>
</nav>
