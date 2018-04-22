<?php 

  include 'functions.php';
  $tu = totalUser();
  $tam = totalAdminMatrik();
  $tp = totalPembina();
  $tm = totalMahasiswa();
   
?>

<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box-2 bg-blue">
                        <div class="icon">
                            <a href="?page=users"><i class="material-icons">account_box</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH PENGGUNA SISTEM</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tu as $totalUser){ echo $totalUser; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-green">
                        <div class="icon">
                            <a href="?page=adminmatrik"><i class="material-icons">supervisor_account</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH ADMIN MATRIKULASI</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tam as $totalAM){ echo $totalAM; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-cyan">
                        <div class="icon">
                            <a href="?page=pembina"><i class="material-icons">gavel</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH PEMBINA MAHASISWA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tp as $totalPembina){ echo $totalPembina; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-orange">
                        <div class="icon">
                            <a href="?page=mahasiswa"><i class="material-icons">gavel</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH MAHASISWA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tm as $totalMahasiswa){ echo $totalMahasiswa; }?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
</div>