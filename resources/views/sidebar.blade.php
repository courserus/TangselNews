    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="back-end/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-home"></i>
                                <span class="sub-item">Beranda</span>

                            </a>
                            <div class="collapse">

                            </div>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('berita') }}">
                                <i class="fas fa-pen-square"></i>
                                <span class="sub-item">Berita</span>

                            </a>
                            <div class="collapse" id="base">

                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-th-list"></i>
                                <p>Konten Profil</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('contacts.index') }}">
                                            <span class="sub-item">Kontak</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('uploadImage.index') }}">
                                            <span class="sub-item">Lambang Daerah</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('visi.misi.index') }}">
                                            <span class="sub-item">Visi-Misi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('walikota.index') }}">
                                            <span class="sub-item">Profil Walikota</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('wakil_walikota.index') }}">
                                            <span class="sub-item">Profil Wakil Walikota</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sejarah.index') }}">
                                            <span class="sub-item">Sejarah Tangsel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/icon-menu.html">
                                            <span class="sub-item">Struktur Pemerintahan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/icon-menu.html">
                                            <span class="sub-item">Gambaran Umum</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/icon-menu.html">
                                            <span class="sub-item">Tangsel Dalam Angka</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/icon-menu.html">
                                            <span class="sub-item">Geografi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/icon-menu.html">
                                            <span class="sub-item">Sarana dan Prasarana</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#forms">
                                <i class="fas fa-layer-group"></i>
                                <p>Informasi Publik</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('SKPD') }}">
                                            <span class="sub-item">SKPD</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/forms/forms.html">
                                            <span class="sub-item">List SKPD</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('wisata') }}">
                                            <span class="sub-item">Wisata</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kuliner') }}">
                                            <span class="sub-item">Kuliner</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('nama.pejabat') }}">
                                            <span class="sub-item">Nama Pejabat</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#tables">
                                <i class="fa fa-users"></i>
                                <p>Even Dan Saran</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('tambah_menu') }}">
                                            <span class="sub-item">Tambah Menu</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('list_menu') }}">
                                            <span class="sub-item">List Menu</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('saran') }}">
                                            <span class="sub-item">Saran</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('video.upload') }}">
                                <i class="fas fa-camera"></i>
                                <span class="sub-item">Video</span>

                            </a>
                            <div class="collapse">

                            </div>


                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#MasterUser">
                                <i class="fa fa-user-secret"></i>
                                <p>front-end</p>
                            </a>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#MasterUser">
                                <i class="fa fa-user-secret"></i>
                                <p>Master User</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#Album&Gallery">
                                <i class="fa fa-camera-retro"></i>
                                <p>Album & Gallery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#Album&Gallery">
                                <i class="fa fa-user-secret"></i>
                                <p>Master Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Maps</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="back-end/maps/googlemaps.html">
                                            <span class="sub-item">Google Maps</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/maps/jsvectormap.html">
                                            <span class="sub-item">Jsvectormap</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Charts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="back-end/charts/charts.html">
                                            <span class="sub-item">Chart Js</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="back-end/charts/sparkline.html">
                                            <span class="sub-item">Sparkline</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
