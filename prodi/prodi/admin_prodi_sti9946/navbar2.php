<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <img class="img" src="logo.png" style="width:35px;">
        </button>
        <div class="sidebar-logo">
            <a href="index.php">UNMBO-STI</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="index.php" class="sidebar-link">
                <i class="lni lni-grid-alt"></i></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="khs_prodi.php" class="sidebar-link">
                <i class="lni lni-book"></i></i>
                <span>KHS</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="aktivasi_mahasiswa.php" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Aktivasi Mahasiswa</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
            data-bs-target="#auth3" aria-expanded="false" aria-controls="auth1">
            <i class="lni lni-book"></i>
            <span>Mata Kuliah</span></a>
            <ul id="auth3" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="matkul.php" class="sidebar-link">Mata Kuliah</a>
            </li>
            <li class="sidebar-item">
                <a href="pengampu.php" class="sidebar-link">Pengampu</a>
            </li>
        </ul>
        </li>
</ul>
<div class="sidebar-footer">
    <a href="../../logout_admin_prodi.php" class="sidebar-link">
        <i class="lni lni-exit"></i>
        <span>Logout</span>
    </a>
</div>
</aside>