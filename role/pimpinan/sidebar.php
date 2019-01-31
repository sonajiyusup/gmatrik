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
                    <li class="header">PROGRAM PEMBINAAN</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'shalatia' || $_GET['page'] == 'shalatbpembina' || $_GET['page'] == 'shalatpdetail' || $_GET['page'] == 'shalatbpembinadetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">watch_later</i>
                            <span>Shalat Wajib</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'shalatpdetail'  || $_GET['page'] == 'shalatbyday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=shalat">Ikhtisar</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalatm'|| $_GET['page'] == 'shalatmdetail' || $_GET['page'] == 'shalatmbyperiod' || $_GET['page'] == 'shalatmbyday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=shalatm">Berdasar Mahasiswa</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalatia'|| $_GET['page'] == 'shalatiadetail' || $_GET['page'] == 'shalatiabyperiod' || $_GET['page'] == 'shalatiabyday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=shalatia">Berdasar Ikhwan/Akhwat</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalatbpembina' || $_GET['page'] == 'shalatbpembinadetail' || $_GET['page'] == 'shalatbpembinabp' || $_GET['page'] == 'shalatbpembinabpday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=shalatbpembina">Berdasar Pembina</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalatw' || $_GET['page'] == 'shalatwdetail' || $_GET['page'] == 'shalatwperiod' || $_GET['page'] == 'shalatwbday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=shalatw">Berdasar Waktu Shalat</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurslt' || $_GET['page'] == 'udzursltdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=udzurslt">Udzur</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'manualslt' || $_GET['page'] == 'manualsltdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=manualslt">Presensi Manual</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'importtalim' || $_GET['page'] == 'jtalim' || $_GET['page'] == 'talimm' || $_GET['page'] == 'talimia' || $_GET['page'] == 'talimp' || $_GET['page'] == 'talimt' || $_GET['page'] == 'talimia') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Ta'lim</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/normal-tables.html">Ikhtisar</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Berdasar Mahasiswa</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimia') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimia">Berdasar Ikhwan/Akhwat</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimp') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimp">Berdasar Pembina</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimt') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimt">Berdasar Jenis Ta'lim</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'jtalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=jtalim">Jadwal Ta'lim</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsinm' || $_GET['page'] == 'tahsint' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'tahsinia' || $_GET['page'] == 'tahsinp' || $_GET['page'] == 'tahsint' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'targethafalan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">import_contacts</i>
                            <span>Tahsin/Tahfidz</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);"><span>Ikhtisar</span></a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsinm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=tahsinm"><span>Berdasar Mahasiswa</span></a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsinia') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=tahsinia"><span>Berdasar Ikhwan/Akhwat</span></a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsinp') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=tahsinp"><span>Berdasar Pembina</span></a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsint') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=tahsint"><span>Berdasar Tahsin</span></a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'targethafalan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="javascript:void(0);" class="menu-toggle">
                                    <span>Hafalan Quran</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Ikhtisar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Berdasar Mahasiswa</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Berdasar Juz</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Berdasar Surah</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Berdasar Jumlah Ayat</span>
                                        </a>
                                    </li>
                                    <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'targethafalan') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=targethafalan">
                                            <span>Target Hafalan Quran</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'udzurtahsin') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=udzurtahsin">
                                    <span>Udzur</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'jplg' || $_GET['page'] == 'jplgdetail') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                        >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">card_travel</i>
                            <span>Jadwal Kepulangan</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'jplg' || $_GET['page'] == 'jplgdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=jplg">Data Jadwal Pulang</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">KOMISI DISIPLIN</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'pikhtisar' || $_GET['page'] == 'pbentuk' || $_GET['page'] == 'paksi' || $_GET['page'] == 'psanksi' || $_GET['page'] == 'planjut' || $_GET['page'] == 'pmaindetail'  || $_GET['page'] == 'pbentukdetail'  || $_GET['page'] == 'paksidetail' || $_GET['page'] == 'psanksidetail' || $_GET['page'] == 'planjutdetail') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">gavel</i>
                            <span>Pelanggaran</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pikhtisar' || $_GET['page'] == 'pmaindetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pikhtisar">Ikhtisar</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pbentuk' || $_GET['page'] == 'pbentukdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pbentuk">Bentuk Pelanggaran</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'paksi' || $_GET['page'] == 'paksidetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=paksi">Aksi Pelanggaran</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'psanksi' || $_GET['page'] == 'psanksidetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=psanksi">Sanksi</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'planjut' || $_GET['page'] == 'planjutdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=planjut">Tindak Lanjut</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">PENGGUNA</li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Mahasiswa</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=mahasiswa">Data Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Pembina</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pembina">Data Pembina</a>
                            </li>
                            <li>
                                <a href="?page=mbinaan">Mahasiswa Binaan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">AKUN SAYA</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'profil' || $_GET['page'] == 'editprofil') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
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
            if ($_GET['page'] == 'mahasiswa') {
              include 'mahasiswa/mahasiswa.php';
            } else if ($_GET['page'] == 'pembina') {
              include 'pembina/pembina.php';
            } else if ($_GET['page'] == 'pembinadetails') {
              include 'pembina/pembina_detail.php';
            } else if ($_GET['page'] == 'editpembina') {
              include 'pembina/pembina_edit.php';
            } else if ($_GET['page'] == 'profil') {
              include 'profil.php';
            } else if ($_GET['page'] == 'targethafalan') {
              include 'tahsin/hafalan/inputtarget.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>