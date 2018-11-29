<?php 

  include 'functions.php';

  $idPembina = $_SESSION['id_pembina'];

  $tm = totalBinaanByPembina($idPembina);
  // $tp = totalPelanggaranBinaanByPembina($idPembina);
?>

<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-blue">
                        <div class="icon">
                            <a href="?page=mahasiswa"><i class="material-icons">account_box</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH MAHASISWA BINAAN</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tm as $totalMahasiswa){ echo $totalMahasiswa; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-red">
                        <div class="icon">
                            <a href="?page=pikhtisar"><i class="material-icons">gavel</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH PELANGGARAN</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php //foreach($tp as $totalPelanggaran){ echo $totalPelanggaran; }?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
</div>