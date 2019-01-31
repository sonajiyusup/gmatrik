<?php 

  include 'functions.php';
  $tb = totalPembina();
  $tm = totalMahasiswa();
  // $tp = totalPelanggaran();
  
?>

<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="info-box-2 bg-blue">
                        <div class="icon">
                            <a href="?page=mahasiswa"><i class="material-icons">account_box</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH MAHASISWA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tm as $totalMahasiswa){ echo $totalMahasiswa; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="info-box-2 bg-green">
                        <div class="icon">
                            <a href="?page=pembina"><i class="material-icons">supervisor_account</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH PEMBINA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tb as $totalPembina){ echo $totalPembina; }?></div>
                        </div>
                    </div>
                </div>
            </div>
            
</div>