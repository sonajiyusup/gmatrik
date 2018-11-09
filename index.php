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

    <link rel="stylesheet" href="assets/css/jquery-ui.css">

    <!-- Bootstrap Core Css -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Toogle Button Css -->
    <link href="assets/css/toogle.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Spinner Css -->
    <link href="assets/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="assets/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">

    <link href='assets/css/select2.min.css' rel='stylesheet'>

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="assets/css/iCheck/all.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">

    <!-- Wait Me Css -->
    <link href="assets/css/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="assets/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
      /*customize align material design icons*/
        .vertical-align-middle { 
            vertical-align: middle; 
        }
        .padding-bottom-3 {
            padding-bottom: 3px;
        }        
    </style>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.chained.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>

    <script>
    $(function() {
      $( "#daftarMhs" ).autocomplete({
        source: 'action/cari.php'
      });
    });
    </script>    

    <!-- <script src='assets/js/select2.min.js'></script> -->

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    <!-- Bootstrap Core Js -->
    <script src="assets/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/js/jquery.slimscroll.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="assets/js/jquery.spinner.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="assets/js/icheck.min.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/js/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="assets/js/Chart.bundle.min.js"></script>

    <script src="assets/js/jquery.sparkline.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="assets/js/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/daterangepicker.js"></script>

    <!-- datepicker -->
    <script src="assets/js/bootstrap-datepicker.min.js"></script>

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
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <!-- <script src="assets/js/chartjs.js"></script> -->

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

        //Modal Hapus Data Udzur Shalat Role Mahasiswa
        $(document).ready(function() {
            $('#ModalHapusUdzur').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });    

        //Modal Hapus Data Presensi manual Shalat Role Mahasiswa
        $(document).ready(function() {
            $('#ModalHapusManualSlt').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });  

        //Modal Hapus Data Jadwal Pulang Detail
        $(document).ready(function() {
            $('#ModalHapusJplg').on('show.bs.modal', function(e) {
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
/*    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-green'
    });  */

    $(document).ready(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });    


    var triggeredByChild = false;
    var triggeredByChild2 = false;

    // Hari 1 Jplg
    $('#check-all1').on('ifChecked', function (event) {
        $('.check').iCheck('check');
        triggeredByChild = false;
    });

    $('#check-all1').on('ifUnchecked', function (event) {
        if (!triggeredByChild) {
            $('.check').iCheck('uncheck');
        }
        triggeredByChild = false;
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('.check').on('ifUnchecked', function (event) {
        triggeredByChild = true;
        $('#check-all1').iCheck('uncheck');
    });

    $('.check').on('ifChecked', function (event) {
        if ($('.check').filter(':checked').length == $('.check').length) {
            $('#check-all1').iCheck('check');
        }
    });    

    // Hari 2 Jplg
    $('#check-all2').on('ifChecked', function (event) {
        $('.check2').iCheck('check');
        triggeredByChild2 = false;
    });

    $('#check-all2').on('ifUnchecked', function (event) {
        if (!triggeredByChild2) {
            $('.check2').iCheck('uncheck');
        }
        triggeredByChild2 = false;
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    $('.check2').on('ifUnchecked', function (event) {
        triggeredByChild2 = true;
        $('#check-all2').iCheck('uncheck');
    });

    $('.check2').on('ifChecked', function (event) {
        if ($('.check2').filter(':checked').length == $('.check2').length) {
            $('#check-all2').iCheck('check');
        }
    }); 
    
    //Test Radio iCheck on jplg with alert
    /*$('.radiojk').on('ifChecked', function(event){
      alert($(this).val());
    });*/
});
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

<script>
  $("#paksi").chained("#pbentuk");
  $("#planjut").chained("#psanksi");
</script> 
      
</body>
</html>