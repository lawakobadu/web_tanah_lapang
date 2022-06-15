<?php
	
	if (isset($_POST['add'])) 
	{
		$nama 			= $_POST['nama'];
		$nik 			= $_POST['nik'];
		$nokk		 	= $_POST['nokk'];
		$tgl_lahir 		= $_POST['tgl_lahir'];
		$id_jk 			= $_POST['id_jk'];
		$alamat			= $_POST['alamat'];
		$id_rt			= $_POST['id_rt'];
		$id_rw			= $_POST['id_rw'];
		$pekerjaan		= $_POST['pekerjaan'];	
		$id_status1		= $_POST['id_status1'];	
		$id_status2		= $_POST['id_status2'];	
		
		
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "assets/img/profil/";
		$foto 				= basename ($fileName);
		$v_foto				= str_replace(' ','_',$foto);

		$age = date_diff(date_create($tgl_lahir), date_create('now'))->y;
		if(!empty($_POST['nokk'])) 
		{
   			$tgl_kk = date('y-m-d');
			
		} else
		{
			$tgl_kk = 0;
		}

		$created=date('y-m-d');
		

		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 10044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{

						$sql = "INSERT INTO penduduk (nama, nik, tgl_kk, nokk, tgl_lahir, id_jk,umur, alamat, id_rt, id_rw, pekerjaan, foto, created ) 
							VALUES ('$nama', '$nik','$tgl_kk', '$nokk', '$tgl_lahir', $id_jk, $age, '$alamat', $id_rt, $id_rw , '$pekerjaan', '$v_foto','$created')";
							var_dump($sql);
					
						if ( $conn->query($sql) === TRUE ) 
						{
							$id = $conn->insert_id;
							$sql = "INSERT INTO det_dom(id_penduduk, id_status1, tgl) VALUES ($id, $id_status1,NOW())";
							$sql2 = "INSERT INTO det_hidup(id_penduduk, id_status2, tgl) VALUES ($id, $id_status2,NOW())";

							if ( $conn->query($sql) === TRUE ) 
							{
								if ( $conn->query($sql2) === TRUE ) 
								{
									$_SESSION['status'] = "0";
									$_SESSION['pesan'] = "Penduduk Baru Berhasil Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.index">';
								}
								else
								{
									$_SESSION['status'] = "1";
									$_SESSION['pesan'] = "Penduduk Baru Gagal Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.add">';
								}
							}
							else
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Penduduk Baru Gagal Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.add">';
							}

						} else 
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "NIK Sudah Digunakan!";
							echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.add">';
						}
					}
					else
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Gambar Gagal Diupload!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.add">';
					}
				}
				else
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.add">';
				}
			}
			else
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.add">';
			}
		}
		else
		{
		 		$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Gambar Tidak Boleh Kosong!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.add">';
		}
	}
	else if(isset($_POST['edit']))
	{
		$allowExt 		= array( 'png', 'jpg', 'jpeg' );
		$fileName 		= $_FILES['foto']['name'];
		$fileExt		= strtolower(end(explode('.', $fileName)));
		$fileSize		= $_FILES['foto']['size'];
		$fileTemp 		= $_FILES['foto']['tmp_name'];
		$upload_dir 	= "assets/img/profil/";
		$foto 			= basename ($fileName);
		$v_foto 		= str_replace(' ','_',$foto);

		$id        		= $_POST['id'];
		$nama 			= $_POST['nama'];
		$nik 			= $_POST['nik'];
		$nokk		 	= $_POST['nokk'];
		$tgl_kk		 	= $_POST['tgl_kk'];
		$tgl_lahir 		= $_POST['tgl_lahir'];
		$id_jk 			= $_POST['id_jk'];
		$alamat			= $_POST['alamat'];
		$id_rt			= $_POST['id_rt'];
		$id_rw			= $_POST['id_rw'];
		$pekerjaan		= $_POST['pekerjaan'];	
		$id_status1		= $_POST['id_status1'];	
		$id_status2		= $_POST['id_status2'];
	
	
		if(!empty($_POST['nokk'])) 
		{
			$sql = "SELECT*FROM penduduk WHERE nokk = '$nokk'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		
			if ($row['nokk'] != $nokk)
			{
   				$tgl_kk = date('y-m-d');
			} 
		}

	 	
		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 5044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{
						$sql = "UPDATE penduduk SET
								nama		= '$nama',
								nik 	    = '$nik',
								tgl_kk 		= '$tgl_kk',
								nokk 		= '$nokk',
								tgl_lahir 	= '$tgl_lahir',
								id_jk       = $id_jk,
								alamat		= '$alamat',
								id_rt		= $id_rt, 
								id_rw 		= $id_rw,
								pekerjaan 	= '$pekerjaan',
								foto		= '$v_foto'
								WHERE id 	= $id";
			
						if ( $conn->query($sql) === TRUE ) 
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Data Penduduk Berhasil Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.detail&id=' . $id . '">';
						} 
						else 
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Data Penduduk Gagal Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.edit&id=' . $id . '">';
						}
					}
					else 
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Gambar Gagal Diupload!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.edit&id=' . $id . '">';
					}
				}
				else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB !";
					echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.edit&id=' . $id . '">';
				}
			}
			else 
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.edit&id=' . $id . '">';
			}

		}
		else
		{
			$sql = "UPDATE penduduk SET
					nama		= '$nama',
					nik 	    = '$nik',
					tgl_kk 		= '$tgl_kk',
					nokk 		= '$nokk',
					tgl_lahir 	= '$tgl_lahir',
					id_jk       = $id_jk,
					alamat		= '$alamat',
					id_rt		= $id_rt, 
					id_rw 		= $id_rw,
					pekerjaan 	= '$pekerjaan'
					WHERE id 	= $id";

				if ( $conn->query($sql) === TRUE ) 
				{
					$_SESSION['status'] = "0";
					$_SESSION['pesan'] = "Data Penduduk Berhasil Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.detail&id=' . $id . '">';
				} 
				else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Data Penduduk Gagal Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=penduduk.edit&id=' . $id . '">';	

				}
		}
	}

?>

