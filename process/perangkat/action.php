<?php
	if (isset($_POST['edit'])) 
	{
		// lurah
		$allowExt1 			= array( 'png', 'jpg', 'jpeg' );
		$fileName1 			= $_FILES['foto_lurah']['name'];
		$fileExt1			= strtolower(end(explode('.', $fileName1)));
		$fileSize1			= $_FILES['foto_lurah']['size'];
		$fileTemp1 			= $_FILES['foto_lurah']['tmp_name'];
		$upload_dir1 		= "assets/img/perangkat/";
		$foto_lurah			= basename ($fileName1);
		$v_foto				= str_replace(' ','_',$foto_lurah);	

		// sekre
		$allowExt2 			= array( 'png', 'jpg', 'jpeg' );
		$fileName2 			= $_FILES['foto_sekre']['name'];
		$fileExt2			= strtolower(end(explode('.', $fileName2)));
		$fileSize2			= $_FILES['foto_sekre']['size'];
		$fileTemp2 			= $_FILES['foto_sekre']['tmp_name'];
		$upload_dir2 		= "assets/img/perangkat/";
		$foto_sekre			= basename ($fileName2);
		$w_foto				= str_replace(' ','_',$foto_sekre);	

		// bendahara

		$allowExt3 			= array( 'png', 'jpg', 'jpeg' );
		$fileName3 			= $_FILES['foto_bend']['name'];
		$fileExt3			= strtolower(end(explode('.', $fileName3)));
		$fileSize3			= $_FILES['foto_bend']['size'];
		$fileTemp3 			= $_FILES['foto_bend']['tmp_name'];
		$upload_dir3 		= "assets/img/perangkat/";
		$foto_bend			= basename ($fileName3);
		$x_foto				= str_replace(' ','_',$foto_bend);	
		
		if(($_FILES['foto_lurah']['size'] > 0) || ($_FILES['foto_sekre']['size'] > 0) || ($_FILES['foto_bend']['size'] > 0))
		{
			
					if(move_uploaded_file( $fileTemp1,$upload_dir1.$v_foto)) 
					{
						
						
								$sql = "UPDATE profil SET foto_lurah = '$v_foto', foto_sekre = '$w_foto', foto_bend = '$x_foto'";
								if ( $conn->query($sql) === TRUE ) 
								{
									echo '<script>alert("data berhasil disimpan"); </script>';
									echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';
		
								} else 
								{
									echo '<script>alert("data gagal diupload"); </script>';
									echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';
								}

						
					}
					else if (move_uploaded_file( $fileTemp2,$upload_dir2.$w_foto)) 
					{

						$sql = "UPDATE profil SET foto_lurah = '$v_foto', foto_sekre = '$w_foto', foto_bend = '$x_foto'";
						if ( $conn->query($sql) === TRUE ) 
						{
							echo '<script>alert("data berhasil disimpan"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';

						} else 
						{
							echo '<script>alert("data gagal diupload"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';
						}
					}
					else if (move_uploaded_file( $fileTemp3,$upload_dir3.$x_foto)) 
					{
						
								$sql = "UPDATE profil SET foto_lurah = '$v_foto', foto_sekre = '$w_foto', foto_bend = '$x_foto'";
								if ( $conn->query($sql) === TRUE ) 
								{
									echo '<script>alert("data berhasil disimpan"); </script>';
									echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';
		
								} else 
								{
									echo '<script>alert("data gagal diupload"); </script>';
									echo '<meta http-equiv="refresh" content="0;URL=?p=perangkat.index">';
								}
					}
				
		}
		else
		{
		 echo "gagal2";
		}
	}
		
		
		
?>