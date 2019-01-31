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
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'shalatia' || $_GET['page'] == 'shalatbpembina' || $_GET['page'] == 'shalatpdetail' || $_GET['page'] == 'shalatbpembinadetail' || $_GET['page'] == 'shalatbpembinabp' || $_GET['page'] == 'shalatbpembinabpday' || $_GET['page'] == 'shalatbyday' || $_GET['page'] == 'shalatiadetail' || $_GET['page'] == 'shalatiabyperiod' || $_GET['page'] == 'shalatiabyday' || $_GET['page'] == 'shalatm'|| $_GET['page'] == 'shalatmdetail' || $_GET['page'] == 'shalatmbyperiod' || $_GET['page'] == 'shalatmbyday' || $_GET['page'] == 'shalatw' || $_GET['page'] == 'shalatwdetail' || $_GET['page'] == 'shalatwperiod' || $_GET['page'] == 'shalatwbday' || $_GET['page'] == 'importshalat' || $_GET['page'] == 'manualslt' || $_GET['page'] == 'manualsltdetail' || $_GET['page'] == 'udzurslt' || $_GET['page'] == 'udzursltdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">watch_later</i>
                            <span>Shalat</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'shalatpdetail'  || $_GET['page'] == 'shalatbyday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=shalat">Nilai Presensi Shalat</a>
                            </li>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'shalat' || $_GET['page'] == 'shalatpdetail'  || $_GET['page'] == 'shalatbyday') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=shalat">Udzur Shalat</a>
                            </li>

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
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'importshalat') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=importshalat">Import Data Presensi Shalat</a>
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
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Nilai Presensi Ta'lim</a>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Data Ta'lim</a>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Udzur Ta'lim</a>


                            <!-- <li>
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
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'importtalim') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=importtalim">Import DB Presensi</a> -->
                            </li>

                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'tahsinm' || $_GET['page'] == 'tahsint' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'tahsinia' || $_GET['page'] == 'tahsinp' || $_GET['page'] == 'tahsint' || $_GET['page'] == 'udzurtahsin' || $_GET['page'] == 'tahsinprt' || $_GET['page'] == 'hafalanm' || $_GET['page'] == 'hafalans' || $_GET['page'] == 'targethafalan' || $_GET['page'] == 'hafalanp' || $_GET['page'] == 'setorhafalan' || $_GET['page'] == 'setordetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">import_contacts</i>
                            <span>Tahsin/Tahfidz</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Nilai Presensi Tahsin/Tahfidz</a>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Data Tahsin/Tahfidz</a>
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'talimm') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=talimm">Udzur Tahsin/Tahfidz</a>

                            <!-- <li>
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
                                    if ($_GET['page'] == 'tahsinprt') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                                <a href="?page=tahsinprt">
                                    <span>Pertemuan</span>
                                </a> -->
                            </li>
                           <!-- <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'hafalanm' || $_GET['page'] == 'hafalans' || $_GET['page'] == 'targethafalan' || $_GET['page'] == 'hafalanp' || $_GET['page'] == 'setorhafalan' || $_GET['page'] == 'setordetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="javascript:void(0);" class="menu-toggle">
                                    <span>Hafalan Quran</span>
                                </a>
                                <ul class="ml-menu">
                                    <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'hafalanm') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=hafalanm">
                                            <span>Berdasar Mahasiswa</span>
                                        </a>
                                    </li>
                                    <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'hafalanp') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=hafalanp">
                                            <span>Berdasar Pembina</span>
                                        </a>
                                    </li>
                                    <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'hafalans') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=hafalans">
                                            <span>Berdasar Surah</span>
                                        </a>
                                    </li>
                                    <li <?php 
                                          if (isset($_GET['page'])) {
                                            if ($_GET['page'] == 'setorhafalan' || $_GET['page'] == 'setordetail') {
                                              echo "class='active'";
                                            }
                                          }
                                        ?>
                                    ><a href="?page=setorhafalan">
                                            <span>Penyetoran Hafalan Quran</span>
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
                            -->
                        </ul>
                        <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'pelanggaran' || $_GET['page'] == 'paksi' || $_GET['page'] == 'psanksi') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Nilai Total</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pelanggaran') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pelanggaran">Informas Nilai Total Presensi</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                    
                    <li class="header">ADMINISTRATIF</li>
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
                            <i class="material-icons">calendar_today</i>
                            <span>Pekan</span>
                        </a>
                        <ul class="ml-menu">
                            <li  <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'jplg' || $_GET['page'] == 'jplgdetail') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                              ><a href="?page=jplg">Data Pekan</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                              if ($_GET['page'] == 'pelanggaran' || $_GET['page'] == 'paksi' || $_GET['page'] == 'psanksi') {
                                echo "class='active'";
                              } else{
                                echo '';
                              }
                            }
                          ?>
                      ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">gavel</i>
                            <span>Semester</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pelanggaran') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pelanggaran">Data Semester</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">PENGGUNA</li>
                    <li <?php 
                          if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                              echo "class='active'";
                            }
                          }
                        ?>
                    ><a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Pembina Mahasiswa</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pembina' || $_GET['page'] == 'pembinadetails' || $_GET['page'] == 'editpembina' || $_GET['page'] == 'tambahbinaan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pembina">Data Pembina Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'mahasiswa' || $_GET['page'] == 'mahasiswadetails' || $_GET['page'] == 'editmahasiswa' || $_GET['page'] == 'ortu' || $_GET['page'] == 'ortudetail' || $_GET['page'] == 'editortu') {
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
                                    if ($_GET['page'] == 'pimpinan' || $_GET['page'] == 'editpimpinan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Pimpinan</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pimpinan' || $_GET['page'] == 'editpimpinan') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=pimpinan">Data Pimpinan</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'user') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>User</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php 
                                  if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'user') {
                                      echo "class='active'";
                                    }
                                  }
                                ?>
                            ><a href="?page=user">Data User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">SAYA</li>
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
            } else if ($_GET['page'] == 'editprofil') {
              include 'profil_edit.php';
            } else if ($_GET['page'] == 'mahasiswadetails') {
              include 'mahasiswa/mahasiswa_detail.php';
            } else if ($_GET['page'] == 'editmahasiswa') {
              include 'mahasiswa/mahasiswa_edit.php';
            } else if ($_GET['page'] == 'bypembina') {
              include 'bypembina.php';
            } else if ($_GET['page'] == 'bypembinadetail') {
              include 'bypembinadetail.php';
            } else if ($_GET['page'] == 'tambahbinaan') {
              include 'pembina/pembina_tambahbinaan.php';
            } else if ($_GET['page'] == 'shalat') {
              include 'shalat/shalat.php';
            } else if ($_GET['page'] == 'shalatpdetail') {
              include 'shalat/shalat_periode_new.php';
            } else if ($_GET['page'] == 'shalatbyday') {
              include 'shalat/shalat_byday.php';
            } else if ($_GET['page'] == 'shalatia') {
              include 'shalat/shalat_ikwan_akhwat.php';
            } else if ($_GET['page'] == 'shalatiadetail') {
              include 'shalat/shalat_iadetail.php';
            } else if ($_GET['page'] == 'shalatiabyperiod') {
              include 'shalat/shalat_iadetail_byperiod.php';
            } else if ($_GET['page'] == 'shalatiabyday') {
              include 'shalat/shalat_iadetail_byday.php';
            } else if ($_GET['page'] == 'shalatm') {
              include 'shalat/shalat_bymhs.php';
            } else if ($_GET['page'] == 'shalatmdetail') {
              include 'shalat/shalat_bymhsdetail.php';
            } else if ($_GET['page'] == 'shalatmbyperiod') {
              include 'shalat/shalat_bymhsdetail_byperiod.php';
            } else if ($_GET['page'] == 'shalatmbyday') {
              include 'shalat/shalat_bymhsdetail_byperiod_byday.php';
            } else if ($_GET['page'] == 'shalatbpembina') {
              include 'shalat/shalat_bypembina.php';
            } else if ($_GET['page'] == 'shalatbpembinadetail') {
              include 'shalat/shalat_bypembinadetail.php';
            } else if ($_GET['page'] == 'shalatbpembinadetailnew') {
              include 'shalat/shalat_bypembinadetail_byperiod_new.php';
            } else if ($_GET['page'] == 'shalatbpembinabp') {
              include 'shalat/shalat_bypembinadetail_byperiod.php';
            } else if ($_GET['page'] == 'shalatbpembinabpday') {
              include 'shalat/shalat_bypembinadetail_byperiod_byday.php';
            } else if ($_GET['page'] == 'shalatw') {
              include 'shalat/shalat_bywkt.php';
            } else if ($_GET['page'] == 'shalatwdetail') {
              include 'shalat/shalat_bywktdetail.php';
            } else if ($_GET['page'] == 'shalatwperiod') {
              include 'shalat/shalat_bywktdetail_byperiod.php';
            } else if ($_GET['page'] == 'shalatwbday') {
              include 'shalat/shalat_bywktdetail_byperiod_byday.php';
            } else if ($_GET['page'] == 'importshalat') {
              include 'shalat/import.php';
            } else if ($_GET['page'] == 'importtalim') {
              include 'talim/import.php';
            } else if ($_GET['page'] == 'jtalim') {
              include 'talim/jtalim.php';
            } else if ($_GET['page'] == 'talimm') {
              include 'talim/talim_bymhs.php';
            } else if ($_GET['page'] == 'talimia') {
              include 'talim/talim_byIA.php';
            } else if ($_GET['page'] == 'talimp') {
              include 'talim/talim_bypembina.php';
            } else if ($_GET['page'] == 'talimt') {
              include 'talim/talim_bytalim.php';
            } else if ($_GET['page'] == 'jplg') {
              include 'shalat/jplg.php';
            } else if ($_GET['page'] == 'udzurslt') {
              include 'shalat/udzur.php';
            } else if ($_GET['page'] == 'udzursltdetail') {
              include 'shalat/udzur_detail.php';
            } else if ($_GET['page'] == 'manualslt') {
              include 'shalat/manual.php';
            } else if ($_GET['page'] == 'manualsltdetail') {
              include 'shalat/manual_detail.php';
            } else if ($_GET['page'] == 'jplgdetail') {
              include 'shalat/jplg_detail.php';
            } else if ($_GET['page'] == 'paksi') {
              include 'pelanggaran/aksi.php';
            } else if ($_GET['page'] == 'psanksi') {
              include 'pelanggaran/sanksi.php';
            } else if ($_GET['page'] == 'pelanggaran') {
              include 'pelanggaran/data_pelanggaran.php';
            } else if ($_GET['page'] == 'tahsinm') {
              include 'tahsin/tahsin_bymhs.php';
            } else if ($_GET['page'] == 'tahsinia') {
              include 'tahsin/tahsin_byia.php';
            } else if ($_GET['page'] == 'tahsinp') {
              include 'tahsin/tahsin_bypembina.php';
            } else if ($_GET['page'] == 'tahsint') {
              include 'tahsin/tahsin_bytahsin.php';
            } else if ($_GET['page'] == 'udzurtahsin') {
              include 'tahsin/udzur.php';
            } else if ($_GET['page'] == 'tahsinprt') {
              include 'tahsin/tahsin_bypertemuan.php';
            } else if ($_GET['page'] == 'hafalanm') {
              include 'tahsin/hafalan/hafalan_bymhs.php';
            } else if ($_GET['page'] == 'hafalans') {
              include 'tahsin/hafalan/hafalan_bysurah.php';
            } else if ($_GET['page'] == 'targethafalan') {
              include 'tahsin/hafalan/target.php';
            } else if ($_GET['page'] == 'hafalanp') {
              include 'tahsin/hafalan/hafalan_bypembina.php';
            } else if ($_GET['page'] == 'setorhafalan') {
              include 'tahsin/hafalan/setor.php';
            } else if ($_GET['page'] == 'setordetail') {
              include 'tahsin/hafalan/setor_detail.php';
            } else if ($_GET['page'] == 'ortu') {
              include 'mahasiswa/orangtua/orangtua.php';
            } else if ($_GET['page'] == 'ortudetail') {
              include 'mahasiswa/orangtua/orangtua_detail.php';
            } else if ($_GET['page'] == 'editortu') {
              include 'mahasiswa/orangtua/orangtua_edit.php';
            } else if ($_GET['page'] == 'user') {
              include 'user/user.php';
            } else if ($_GET['page'] == 'pimpinan') {
              include 'pimpinan/pimpinan.php';
            } else if ($_GET['page'] == 'editpimpinan') {
              include 'pimpinan/pimpinan_edit.php';
            }
        } else{
            include 'dashboard.php';
        }

    ?>
</section>