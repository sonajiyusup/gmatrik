<?php

include('koneksi.php');

  if(isset($_SESSION['role'])){
    echo '<script language="javascript">document.location="index.php";</script>';
  }

if(isset($_POST['login'])){
    $user = mysql_real_escape_string(htmlentities($_POST['username']));
    $pass = mysql_real_escape_string(htmlentities(($_POST['password'])));

    $sql = mysql_query("SELECT * FROM users WHERE `username`='$user' AND BINARY `password`='$pass'") or die(mysql_error());

    if(mysql_num_rows($sql) == 0){
        echo '<script language="javascript">document.location="login.php?alert=error";</script>';
    }else{
        $row = mysql_fetch_assoc($sql);
    $id = $row['id_user'];
    $_SESSION['id_user'] = $id;

    mysql_query("UPDATE users SET last_login = NOW() WHERE id_user = $id");

        if($row['level'] == 0){
        $sql_profil = mysql_query("SELECT * FROM administrator WHERE id_user=$id") or die(mysql_error());

        while($admin = mysql_fetch_assoc($sql_profil)){
          $ava = $admin['avatar'];
          $id_admin = $admin['id_admin'];
          $nama = $admin['nama'];
          $email = $admin['email'];
          $telp = $admin['telp'];
          $gender = $admin['j_kelamin'];
          
          echo '<script language="javascript">document.location="index.php";</script>';
        }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        }  
        
        $_SESSION['id_admin'] = $id_admin;
        $_SESSION['role'] = 'administrator';
        $_SESSION['nama'] = $nama;        
        $_SESSION['rolename'] = 'Admininstrator';
        $_SESSION['username'] = $user;
        
        }else if($row['level'] == 1){
        $sql_profil = mysql_query("SELECT * FROM pimpinan WHERE id_user=$id") or die(mysql_error());

          while($pimpinan = mysql_fetch_assoc($sql_profil)){
          $ava = $pimpinan['avatar'];
            $id_Pimpinan = $pimpinan['id_pimpinan'];
            $nama = $pimpinan['nama'];
            $email = $pimpinan['email'];
            $telp = $pimpinan['telp'];
            $gender = $pimpinan['j_kelamin'];
            
            echo '<script language="javascript">document.location="index.php";</script>';
          }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        } 

        $_SESSION['id_Pimpinan'] = $id_Pimpinan;
        $_SESSION['nama'] = $nama;
        $_SESSION['role'] = 'pimpinan';
        $_SESSION['rolename'] = 'pimpinan';
        $_SESSION['username'] = $user;   
           
        }else if($row['level'] == 2){
        $sql_profil = mysql_query("SELECT * FROM adminmatrik WHERE id_user=$id") or die(mysql_error());

          while($adminmatrik = mysql_fetch_assoc($sql_profil)){
          $ava = $adminmatrik['avatar'];
            $id_AM = $adminmatrik['id_adminmatrik'];
            $nama = $adminmatrik['nama'];
            $email = $adminmatrik['email'];
            $telp = $adminmatrik['telp'];
          $gender = $adminmatrik['j_kelamin'];
            
            echo '<script language="javascript">document.location="index.php";</script>';
          }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        } 

        $_SESSION['id_AM'] = $id_AM;
        $_SESSION['nama'] = $nama;
        $_SESSION['role'] = 'adminmatrik';
        $_SESSION['rolename'] = 'Admin Matrikulasi';
        $_SESSION['username'] = $user;   
           
        }else if($row['level'] == 3){

      $sql_profil = mysql_query("SELECT * FROM pembina WHERE id_user=$id") or die(mysql_error());

        while($pembina = mysql_fetch_assoc($sql_profil)){
          $ava = $pembina['avatar'];
          $id_pembina = $pembina['id_pembina'];
          $nama = $pembina['nama'];
          $email = $pembina['email'];
          $telp = $pembina['telp'];
          $gender = $pembina['j_kelamin'];
          
          echo '<script language="javascript">document.location="index.php";</script>';
        }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        } 

        $_SESSION['id_pembina'] = $id_pembina;
        $_SESSION['nama'] = $nama;
        $_SESSION['role'] = 'pembina';
        $_SESSION['rolename'] = 'Pembina Mahasiswa';
        $_SESSION['username'] = $user; 

      //$_SESSION['nama'] = $row['nama'];
      //echo '<script language="javascript">document.location="index.php";</script>';
    } else if($row['level'] == 4){

      $sql_profil = mysql_query("SELECT * FROM mahasiswa WHERE id_user = $id") or die(mysql_error());

        while($mahasiswa = mysql_fetch_assoc($sql_profil)){
          $ava = $mahasiswa['avatar'];
          $id_mahasiswa = $mahasiswa['id_mahasiswa'];
          $nama = $mahasiswa['nama'];
          $email = $mahasiswa['email'];
          $telp = $mahasiswa['telp'];
          $gender = $mahasiswa['j_kelamin'];
          
          echo '<script language="javascript">document.location="index.php";</script>';
        }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        } 

        $_SESSION['id_mahasiswa'] = $id_mahasiswa;
        $_SESSION['nama'] = $nama;
        $_SESSION['rolename'] = 'Mahasiswa';
        $_SESSION['username'] = $user; 
        $_SESSION['jKelamin'] = $gender;
        $_SESSION['role'] = 'mahasiswa';

      //$_SESSION['nama'] = $row['nama'];
      //echo '<script language="javascript">document.location="index.php";</script>';
    } else if($row['level'] == 5){

      $sql_profil = mysql_query("SELECT ot.*, m.nama AS nama_mhs FROM orang_tua ot LEFT JOIN mahasiswa m ON ot.id_mahasiswa = m.id_mahasiswa WHERE ot.id_user = $id") or die(mysql_error());

        while($ortu = mysql_fetch_assoc($sql_profil)){
          $ava = $ortu['avatar'];
          $id_ortu = $ortu['id'];
          $id_user = $ortu['id_user'];
          $nama = $ortu['nama'];
          $email = $ortu['email'];
          $telp = $ortu['telp'];
          $nama_mhs = $ortu['nama_mhs'];
          
          echo '<script language="javascript">document.location="index.php";</script>';
        }

        if ($ava == NULL) {
          if ($gender == 'Perempuan' || $gender == 'Akhwat'){
            $_SESSION['ava'] ='default-female.jpg';
          } else
          if ($gender == 'Laki-laki' || $gender == 'Ikhwan'){
            $_SESSION['ava'] ='default-male.png';
          } else
          if ($gender == NULL){
            $_SESSION['ava'] ='default.png';
          }
        } else{
          $_SESSION['ava'] = $ava;
        } 

        $_SESSION['id_ortu'] = $id_ortu;
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama'] = $nama;
        $_SESSION['role'] = 'orangtua';
        $_SESSION['rolename'] = 'Orang Tua Mahasiswa';
        $_SESSION['username'] = $user; 
        $_SESSION['nama_mhs'] = $nama_mhs; 

      //$_SESSION['nama'] = $row['nama'];
      //echo '<script language="javascript">document.location="index.php";</script>';
    }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Matrikulasi</title>
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

    <!-- Materialize Css -->
    <link href="assets/css/materialize.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="assets/img/icon30.png">&nbsp;<b>STEI</b>Tazkia</a>
            <small>Sistem Informasi Pengelolaan Matrikulasi Program Pembinaan</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="login.php" method="POST">
                    <div class="msg">Login untuk memulai sesi</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-cyan waves-effect" type="submit" name="login">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <?php 
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'error') {
                echo "<div class='alert bg-red'><strong>Login Gagal !</strong> Username dan atau Password Salah.<br>Password yang diinput harus sama persis (Case Sensitive)</div> ";
                }
              }
             ?>          
    </div>
                               

    <!-- Jquery Core Js -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/js/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/js/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/sign-in.js"></script>
</body>

</html>