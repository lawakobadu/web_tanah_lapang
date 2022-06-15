<?php
	if (isset($_POST['edit'])) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "assets/img/struktur/";
		$foto 				= basename ($fileName);
		$v_foto				= str_replace(' ','_',$foto);	
		
		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 5044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{

						$sql = "UPDATE profil SET struktur = '$v_foto'";


						if ( $conn->query($sql) === TRUE ) 
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Struktur Organisasi Kelurahan Berhasil Diupdate!";
							
							 echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';

						} else 
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Struktur Organisasi Kelurahan Gagal Diupdate!";
							
							 echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';
						}
					}
					else
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Struktur Organisasi Kelurahan Gagal Diupdate!";
							
						echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';
					}
				}
				else
				{
					$_SESSION['status'] = "2";
					$_SESSION['pesan'] = "Ukuran Foto Melebihi 5 MB!";
							
					echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';
				}
			}
			else
			{
				$_SESSION['status'] = "2";
				$_SESSION['pesan'] = "Ekstensi Foto Tidak Diizinkan!";
							
				echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';
			}
		}
		else
		{
		 	$_SESSION['status'] = "2";
			$_SESSION['pesan'] = "Lengkapi Data!";
							
			echo '<meta http-equiv="refresh" content="0;URL=?p=struktur.index">';
		}
	}
?>