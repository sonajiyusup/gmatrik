<?php
// DB table to use
        date_default_timezone_set('Asia/Jakarta');
		$table = 'data_mahasiswa';
		// Table's primary key
		$primaryKey = 'nama';
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 'db' => 'id_user', 'dt' => 0 ),
			array( 'db' => 'id_mahasiswa', 'dt' => 1 ),
			array( 'db' => 'password', 'dt' => 2 ),
			array(
				'db'        => 'nim',
				'dt'        => 3,
				'formatter' => function( $d, $row ) {
					return "<span class='label bg-deep-orange'>".$d."</span>";
				}
			),
			//$row[0] pada formatter, merujuk pada id_user yg diinit pada dt 0 sebelumnya
			array(
				'db'        => 'nama',
				'dt'        => 4,
				'formatter' => function( $d, $row ) {
					return "<a href='index.php?page=mahasiswadetails&id=".$row[0]."'>".$d."</a>";
				}
			),
			array(
				'db'        => 'j_kelamin',
				'dt'        => 5,
				'formatter' => function( $d, $row ) {
					if($d == 'Ikhwan' || $d == 'Laki-laki'){
						$gender = '<span class="label bg-light-blue">Ikhwan</span>';
					} else if($d == 'Akhwat' || $d == 'Perempuan'){
						$gender = '<span class="label bg-pink">Akhwat</span>';
					} else if($d == NULL){
						$gender = '<span class="label bg-grey">Belum diset</span>';
					}
					return $gender;
				}
			),
			array(
				'db'        => 'last_login',
				'dt'        => 6,
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
				'db'		=> 'id_user',
				'dt'        => 7,
				'formatter' => function( $d, $row ) {
					return '<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="material-icons" style="font-size: 14px">settings</i>&nbsp;<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a title="Edit" style="color:#3C8DBC;" href="index.php?page=editmahasiswa&id='.$row[0].'" class="dropdown-item"><i class="material-icons" style="font-size: 20px">mode_edit</i></a></li>
											<li><a title="Hapus" style="color:#DD4B39;"" href="#ModalHapusMahasiswa" class="dropdown-item" data-toggle="modal" data-href="action/hapus.php?idmahasiswa='.$row[1].'&iduser='.$row[0].'" aria-hidden="true"><i class="material-icons" style="font-size: 20px">delete</i></a>
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