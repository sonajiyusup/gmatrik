<?php 

  include 'functions.php';
  $tb = totalPembina();
  $tm = totalMahasiswa();
  $tp = totalPelanggaran();
  
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
                            <div class="text">JUMLAH MAHASISWA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tm as $totalMahasiswa){ echo $totalMahasiswa; }?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-red">
                        <div class="icon">
                            <a href="?page=pikhtisar"><i class="material-icons">gavel</i></a>
                        </div>
                        <div class="content">
                            <div class="text">JUMLAH PELANGGARAN</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php foreach($tp as $totalPelanggaran){ echo $totalPelanggaran; }?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
              <!-- Line Chart -->
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>SHALAT WAJIB <small>Nilai Rata-rata Semua Mahasiswa Sepanjang Periode</small></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?page=shalat">Lihat Detil</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                                 data-offset="90" data-width="100%" data-height="150px" data-line-Width="3" data-line-Color="rgb(0, 188, 212)"
                                 data-fill-Color="rgba(0, 188, 212, 0.3)">
                                <?php
                                                    $dataNilaiRata = shalatNilaiSemua();
                                                    
                                                    foreach ($dataNilaiRata as $row){
                                                     $nilai[] = $row['nilai'];
                                                    }
                                                    echo implode(",", $nilai);
                                                  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
</div>