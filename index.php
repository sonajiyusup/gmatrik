<?php
    session_start();
  if(!isset($_SESSION['role'])){
    echo '<script language="javascript">document.location="login.php";</script>';
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="assets/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="assets/css/iCheck/all.css">

    <!-- Wait Me Css -->
    <link href="assets/css/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="assets/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/js/jquery.slimscroll.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="assets/js/icheck.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/js/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="assets/js/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="assets/js/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="assets/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/jszip.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="assets/js/jquery.countTo.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/jquery-datatable.js"></script>
    <script src="assets/js/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/modals.js"></script>    
</head>

<body class="theme-blue">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">GRAPH MATRIK</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php  
          if ($_SESSION['role'] =='administrator') {
            include 'role/admin/sidebar.php';
          } else
          if($_SESSION['role'] =='adminmatrik'){
            include 'role/adminmatrik/sidebar.php';
          } else
          if($_SESSION['role'] =='pembina'){
            include 'role/pembina/sidebar.php';
          } else
          if($_SESSION['role'] =='mahasiswa'){
            include 'role/mahasiswa/sidebar.php';
          }
        ?>         
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

            <div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">ANDA YAKIN ?</h4>
                        </div>
                        <div class="modal-footer">
                            <a href="logout.php" class="btn btn-danger btn-ok waves-effect">LOGOUT</a>
                            <button class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>       

    <!-- page script -->
    <script>
      /*$(document).ready(function() {
        $('#tableUsers').DataTable()
      });

      $(document).ready(function() {
        $('#tablePelanggaran').DataTable()
      });*/
    </script>

      <script type="text/javascript">
        //Modal Hapus Data Pembina
        $(document).ready(function() {
            $('#ModalHapusPembina').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });

        //Modal Hapus Data Mahasiswa
        $(document).ready(function() {
            $('#ModalHapusMahasiswa').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });     

        //Modal Hapus Data Mahasiswa Binaan By Pembina
        $(document).ready(function() {
            $('#ModalHapusBinaan').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });    
      </script>

<script>
  $(document).ready(function() {
    $('#tableDaftarBinaan').DataTable()
  });
</script>      

<script type="text/javascript">
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-green'
    })  
</script>  

<!-- Fungsi Validasi Password Confirm -->
<script type="text/javascript">
var pwinput2 = document.getElementById("pwinput2")
  , pwinput3 = document.getElementById("pwinput3");

function validatePassword(){
  if(pwinput2.value != pwinput3.value) {
    pwinput3.setCustomValidity("Password Tidak Sama !");
  } else {
    pwinput3.setCustomValidity('');
  }
}

pwinput2.onchange = validatePassword;
pwinput3.onkeyup = validatePassword;
</script>   
      
  </body>
</html>