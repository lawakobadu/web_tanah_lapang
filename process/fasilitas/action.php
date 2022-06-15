<?php
	
	if (isset($_POST['add'])) 
	{
		
		$nama 			= $_POST['nama'];
		$alamat 		= $_POST['alamat'];
		$id_jenis		= $_POST['id_jenis'];
		
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "assets/img/fasilitas/";
		$foto 				= basename ($fileName);
		$v_foto				= str_replace(' ','_',$foto);
		
		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 10044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{

						
						$sql = "INSERT INTO fasilitas (nama, id_jenis, alamat, foto) 
							VALUES ('$nama', $id_jenis,'$alamat', '$v_foto')";
					
					
						if ( $conn->query($sql) === TRUE ) 
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Fasilitas Baru Berhasil Ditambahkan!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=fasilitas.detail&id=' . $id_jenis . '">';
						}
						else
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Fasilitas Baru Gagal Ditambahkan!";
							echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.add">';
						}
							
					} 
					else 
					{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Gambar Gagal Diupload!";
							echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.add">';
					}
				}
				else
				{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.add">';
				}
			}
			else
			{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
					echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.add">';
			}
		}
		else
		{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Gambar Tidak Boleh Kosong!";
				echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.add">';
		}
	}

	else if(isset($_POST['edit']))
	{
		$allowExt 		= array( 'png', 'jpg', 'jpeg' );
		$fileName 		= $_FILES['foto']['name'];
		$fileExt		= strtolower(end(explode('.', $fileName)));
		$fileSize		= $_FILES['foto']['size'];
		$fileTemp 		= $_FILES['foto']['tmp_name'];
		$upload_dir 	= "assets/img/fasilitas/";
		$foto 			= basename ($fileName);
		$v_foto 		= str_replace(' ','_',$foto);

		$id        		= $_POST['id'];
		$nama 			= $_POST['nama'];
		$alamat 		= $_POST['alamat'];
		$id_jenis		= $_POST['id_jenis'];

		$id2=$id_jenis;
	
		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 5044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{
						$sql = "UPDATE fasilitas SET
								nama		= '$nama',
								id_jenis 	= $id_jenis,
								alamat 		= '$alamat',
								foto		= '$v_foto'
								WHERE id 	= $id";
			
						if ( $conn->query($sql) === TRUE ) 
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Data Fasilitas Berhasil Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=fasilitas.detail2&id=' . $id . '">';
						}
						else
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Data Fasilitas Gagal Diupdate!";
							echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.edit&id=' . $id . '">';
						}
					}
					else 
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Gambar Gagal Diupload!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.edit&id=' . $id . '">';
					}
				}
				else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB !";
					echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.edit&id=' . $id . '">';
				}
			}
			else 
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
				echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.edit&id=' . $id . '">';
			}

		}
		else
		{
			$sql = "UPDATE fasilitas SET
						nama		= '$nama',
						id_jenis 	= $id_jenis,
						alamat 		= '$alamat'
						WHERE id 	= $id";

				if ( $conn->query($sql) === TRUE ) 
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Data Fasilitas Berhasil Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=fasilitas.detail2&id=' . $id . '">';
						}
						else
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Data Fasilitas Gagal Diupdate!";
							echo '<meta http-equiv="refresh" content="0;URL=?p=fasilitas.edit&id=' . $id . '">';
						}
		}
	}

?>