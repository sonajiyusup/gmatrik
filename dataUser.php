<?php
// DB table to use
        date_default_timezone_set('Asia/Jakarta');
		$table = 'data_user';
		// Table's primary key
		$primaryKey = 'id_user';
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 
				'db' => 'id_user', 
				'dt' => 0,
				'formatter' => function( $d, $row ) {
					return "<span class='badge bg-cyan'>".$d."</span>";
				}
			),
			array( 
				'db' => 'username', 
				'dt' => 1,
				'formatter' => function( $d, $row ) {
					//return "<a href='index.php?page=userdetails&id=".$row[0]."'>".$d."</a>";

					if($row[4] == 0){ return "<a href='index.php?page=administratordetails&id=".$row[0]."'>".$d."</a>";}else if($row[4] == 1){ return "<a href='index.php?page=pimpinandetails&id=".$row[0]."'>".$d."</a>" ;}else if($row[4] == 2){ return "<a href='index.php?page=adminmatrikdetails&id=".$row[0]."'>".$d."</a>" ;}else if($row[4] == 3){ return "<a href='index.php?page=pembinadetails&id=".$row[0]."'>".$d."</a>" ;}else if($row[4] == 4){ return "<a href='index.php?page=mahasiswadetails&id=".$row[0]."'>".$d."</a>" ;}

				}
			),
			array( 'db' => 'password', 'dt' => 2 ),
			array( 'db' => 'password_default', 'dt' => 3 ),
			array(
				'db'        => 'level',
				'dt'        => 4,
				'formatter' => function( $d, $row ) {
					if($row[4] == 0){ return "<a href='index.php?page=administrator' class='btn bg-indigo btn-xs'>Administrator</a>";}else if($row[4] == 1){ return "<a href='index.php?page=pimpinan' class='btn bg-blue-grey btn-xs'>Pimpinan Matrikulasi</a>" ;}else if($row[4] == 2){ return "<a href='index.php?page=adminmatrik' class='btn bg-pink btn-xs'>Admin Matrikulasi</a>" ;}else if($row[4] == 3){ return "<a href='index.php?page=pembina' class='btn bg-green btn-xs'>Pembina Mahasiswa</a>" ;}else if($row[4] == 4){ return "<a href='index.php?page=mahasiswa' class='btn bg-purple btn-xs'>Mahasiswa</a>" ;}

				}
			),
			array(
				'db'        => 'last_login',
				'dt'        => 5,
				'formatter' => function( $d, $row ) {
					if ($d == '0000-00-00 00:00:00'){
						$last_login = 'Belum Pernah';
					}else{
						$last_login = date("d-m-Y H:i", strtotime($d));
					}
					return $last_login;
				}
			),
			//ini column action, harusnya tidak terkait data apapun empty/null cuma ternyata ngg bisa dan ngg nemu, jadi pakai yg ada
			array(
				'db'				=> 'id_user',
				'dt'        => 6,
				'formatter' => function( $d, $row ) {
					return '<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a title="Edit" style="color:#3C8DBC;" href="index.php?page=editmahasiswa&id='.$row[0].'" class="dropdown-item"><i class="material-icons" style="font-size: 20px">mode_edit</i></a></li>
											<li><a title="Hapus" style="color:#DD4B39;"" href="#ModalHapusMahasiswa" class="dropdown-item" data-toggle="modal" data-href="action/hapus.php?idmahasiswa= "aria-hidden="true"><i class="material-icons" style="font-size: 20px">delete</i></a>
											</li>
										</ul>
									</div>';
				}
			)
		);		
		
		// SQL server connection information
		$sql_details = array(
			'user' => 'root',
			'pass' => '',
			'db'   => 'simon',
			'host' => 'localhost'
		);
		
		require( 'ssp.class.php' );
		
		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
		);

?>