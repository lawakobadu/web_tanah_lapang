<?php
	
	if (isset($_POST['add'])) 
	{
		$judul				= $_POST['judul'];
		$tanggal 			= $_POST['tanggal'];
		$isi				= $_POST['isi'];
		$author				= $_POST['author'];
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "assets/img/blog/";
		$foto 				= basename ($fileName);
		$v_foto				= str_replace(' ','_',$foto);	

		if(!$judul && !$isi){
			echo '<script>alert("Judul dan Isi Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else if(!$judul){
			echo '<script>alert("Judul Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else if(!$isi){
			echo '<script>alert("Isi Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else{
			if($_FILES['foto']['size'] > 0)
			{
				if( in_array( $fileExt, $allowExt ) === TRUE ) 
				{
					if( $fileSize < 10044070 ) 
					{
						if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
						{

							$sql = "INSERT INTO `blog`(`judul`, `tanggal`, `author`, `isi`, `foto`) VALUES 
												('$judul', '$tanggal', '$author', '$isi', '$v_foto')";

							if ( $conn->query($sql) === TRUE ) 
							{
								$_SESSION['status'] = "0";
								$_SESSION['pesan'] = "Blog Baru Berhasil Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index">';

							} else 
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Blog Baru Gagal Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
							}
						}
						else
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Gambar Gagal Diupload!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
						}
					}
					else
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
					}
				}
				else
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
				}
			}
			else
			{
				$foto = "cover.jpg";
				$sql = "INSERT INTO `blog`(`judul`, `tanggal`, `author`, `isi`, `foto`) VALUES 
				('$judul', '$tanggal', '$author', '$isi', '$foto')";

				if ( $conn->query($sql) === TRUE ) 
				{
					echo '<script>alert("Data Blog Berhasil Disimpan"); </script>';
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index#?id=1">';

				} else 
				{
					echo '<script>alert("Data Blog Gagal Disimpan"); </script>';
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
				}
			}	
		}	
	}

	else if(isset($_POST['edit']))
	{
		$id_blog 			= $_POST['id'];
		$judul				= $_POST['judul'];
		$tanggal 			= $_POST['tanggal'];
		$isi				= $_POST['isi'];
		$author				= $_POST['author'];
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "assets/img/blog/";
		$foto 				= basename ($fileName);
		$v_foto				= str_replace(' ','_',$foto);	

		if(!$judul && !$isi){
			echo '<script>alert("Judul dan Isi Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else if(!$judul){
			echo '<script>alert("Judul Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else if(!$isi){
			echo '<script>alert("Isi Blog Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=blog.add">';
		}else{
			if($_FILES['foto']['size'] > 0)
			{
				if( in_array( $fileExt, $allowExt ) === TRUE ) 
				{
					if( $fileSize < 1044070 ) 
					{
						if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
						{

							$sql = "UPDATE `blog` SET `judul`='$judul',`tanggal`='$tanggal',`author`='$author',`isi`='$isi',
									`foto`='$v_foto' WHERE id='$id_blog'";

							if ( $conn->query($sql) === TRUE ) 
							{
								$_SESSION['status'] = "0";
								$_SESSION['pesan'] = "Data Blog Berhasil Diupdate!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index">';

							} else 
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Data Blog Gagal Diupdate!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=blog.edit&id=' . $id_blog . '">';
							}
						}
						else
						{
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Gambar Gagal Diupload!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=blog.edit&id=' . $id_blog . '">';
						}
					}
					else
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=blog.edit&id=' . $id_blog . '">';
					}
				}
				else
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.edit&id=' . $id_blog . '">';
				}
			}
			else
			{
				$sql = "UPDATE `blog` SET `judul`='$judul',`tanggal`='$tanggal',`author`='$author',`isi`='$isi'
						WHERE id='$id_blog'";

				if ( $conn->query($sql) === TRUE ) 
				{
					$_SESSION['status'] = "0";
					$_SESSION['pesan'] = "Data Blog Berhasil Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index">';

				} else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Data Blog Gagal Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=blog.edit&id=' . $id_blog . '">';
				}
			}	
		}	
	}

	else if(isset($_POST['delete']))
	{
		if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
			$id_blog = $_POST['id'];
			$sql = "DELETE FROM blog WHERE id = $id_blog";
			if ( $conn->query($sql) === TRUE ) 
			{
				$_SESSION['status'] = "0";
				$_SESSION['pesan'] = "Data Blog Berhasil Dihapus!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index">';

			} else 
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Data Blog Gagal Dihapus!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=blog.index">';
			}
		}
	}

?>