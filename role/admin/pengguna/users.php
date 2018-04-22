<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <h2>MANAJEMEN PENGGUNA 
                            <small>Semua Pengguna Sistem</small>
                          </h2>
                        </div>
                        <div class="body ">
                        	<div class="table-responsive">
													<!-- Table Daftar User -->
						              <table id="tableUser" class="table table-hover table-condensed">
						                <thead>
						                  <tr>
						                    <th>ID User</th>
						                    <th>Username</th>
						                    <th></th>
						                    <th></th>
						                    <th>Level</th>
						                    <th>Terakhir Login</th>
						                    <th>Aksi</th>
						                  </tr>
						                </thead>
						              </table>
						              <!-- /Table Daftar User -->   
						              </div>                       
                        </div>
                    </div>
                </div>
            </div>
</div>

    <script>
    $(document).ready(function() {
      var t = $('#tableUser').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/gmatrik/dataUser.php",
            "order": [[ 4, "asc" ]],
            "columnDefs": [
            	{ "visible": false, "targets": [2,3]},
              { "searchable": false, "orderable": false, "targets": [6]}
            ]
        } );

    } );
    </script>  