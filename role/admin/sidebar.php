<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src=<?php echo "assets/img/user/".$_SESSION['ava']; ?> width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama']; ?></div>
                    <div class="email"><?php echo $_SESSION['rolename']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="?page=profil" style="color:#3C8DBC;"><i class="material-icons">person</i>Profil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#ModalLogout" data-toggle='modal' style='color:#DD4B39;'><i class="material-icons">power_settings_new</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">HOME</li>
                    <li <?php 
                          if ($_SERVER['REQUEST_URI'] == '/gmatrik/index.php') {
                             echo "class='active'";
                          }
                        ?>
                    ><a href="index.php">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">PENGGUNA</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'users' || $_GET['page'] == 'pimpinan' || $_GET['page'] == 'adminmatrik' || $_GET['page'] == 'pembina' || $_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails'  || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'adminmatrikdetails') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Manajemen Pengguna</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'users') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=users">Semua</a>
                            </li>
                        
                        
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pimpinan' || $_GET['page'] == 'pimpinandetails') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pimpinan">Pimpinan Matrikulasi</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'adminmatrik' || $_GET['page'] == 'adminmatrikdetails') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=adminmatrik">Admin Matrikulasi</a>
                            </li>
                        
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pembina">Pembina Matrikulasi</a>
                            </li>
                        
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=mahasiswa">Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">PROFIL</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Profil</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=profil">Profil Saya</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
</aside>

<section class="content">

    <?php  
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'users') {
              include 'pengguna/users.php';
            } else if ($_GET['page'] == 'pembina') {
              include 'pengguna/pembina.php';
            } else if ($_GET['page'] == 'pembinadetails') {
              include 'pengguna/pembina_detail.php';
            } else if ($_GET['page'] == 'adminmatrik') {
              include 'pengguna/adminmatrik.php';
            } else if ($_GET['page'] == 'adminmatrikdetails') {
              include 'pengguna/adminmatrik_detail.php';
            } else if ($_GET['page'] == 'mahasiswa') {
              include 'pengguna/mahasiswa.php';
            } else if ($_GET['page'] == 'mahasiswadetails') {
              include 'pengguna/mahasiswa_detail.php';
            } else if ($_GET['page'] == 'pimpinan') {
              include 'pengguna/pimpinan.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>