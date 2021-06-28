<nav id="sidebar">
    <div class="sidebar-header">
        <h3><span class='text-white fw-bold'>SIM</span> Narotama</h3>
        <strong><span class='text-white'>S</span>N</strong>
    </div>
    <ul class="list-unstyled components">
        <li class="<?= !isset($page) ? 'active' : $page === '' ? 'active' : '' ?>">
            <a href="/">
            <div class="row">
                <div class='col-12 col-md-2 sidebar-item-icon' >
                    <i class="fas fa-home"></i>
                </div>
                <span class="col-10">Dashboard</span>
            </div>
            </a>
        </li>
        <li class="<?= $page === 'matkul' ? 'active' : '' ?>">
            <a href="index.php?page=matkul">
                <div class="row">
                    <div class='col-12 col-md-2 sidebar-item-icon' >
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="col-10">Mata Kuliah</span>
                </div>
            </a>
        </li>
        <li class="<?= $page === 'khs' ? 'active' : '' ?>">
            <a href="index.php?page=khs">
                <div class="row">
                    <div class='col-12 col-md-2 sidebar-item-icon' >
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <span class="col-10">Laporan KHS</span>
                </div>
            </a>
        </li>
        <!-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-controls="pageSubmenu">
                <i class="fas fa-copy"></i>
                <span>Pages</span>
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
    </ul>

</nav>