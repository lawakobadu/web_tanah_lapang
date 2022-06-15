<?php
	error_log( "This code has errors!" );
	if (isset($_POST['add'])) 
	{
		$nama_wisata		= $_POST['nama_wisata'];
		$tempat				= $_POST['tempat'];
		$keterangan			= $_POST['keterangan'];

		if(!$nama_wisata && !$tempat && !$keterangan ){
			echo '<script>alert("Nama Pariwisata, tempat dan Keterangan Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$nama_wisata){
			echo '<script>alert("Nama Pariwisata Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$tempat){
			echo '<script>alert("Tempat Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$keterangan){
			echo '<script>alert("Keterangan Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else{
			
				$sql = "INSERT INTO `pariwisata`(`nama_wisata`, `tempat`, `keterangan`) VALUES 
				('$nama_wisata', '$tempat', '$keterangan')";

				if ( $conn->query($sql) === TRUE ) 
				{
					$sql2 = "SELECT MAX(id) as id FROM pariwisata"; 
					$result = $conn->query($sql2);
					$id = $result->fetch_assoc();
					
					$_SESSION['status'] = "0";
					$_SESSION['pesan'] = "Data Pariwisata Berhasil Disimpan!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar_new&id=' . $id["id"] . '">';

				} else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Data Pariwisata Gagal Disimpan!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
				}			
		}	
	}

	else if(isset($_POST['edit']))
	{
		$id_pariwisata 		= $_POST['id'];
		$nama_wisata		= $_POST['nama_wisata'];
		$tempat				= $_POST['tempat'];
		$keterangan			= $_POST['keterangan'];
		// $allowExt 			= array( 'png', 'jpg', 'jpeg' );
		// $fileName 			= $_FILES['gambar']['name'];
		// $fileExt			= strtolower(end(explode('.', $fileName)));
		// $fileSize			= $_FILES['gambar']['size'];
		// $fileTemp 			= $_FILES['gambar']['tmp_name'];
		// $upload_dir 		= "assets/img/pariwisata/";
		// $gambar 			= basename ($fileName);
		// $v_gambar			= str_replace(' ','_',$gambar);	

		if(!$nama_wisata && !$tempat && !$keterangan){
			echo '<script>alert("Nama Pariwisata, tempat dan Keterangan Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$nama_wisata){
			echo '<script>alert("Nama Pariwisata Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$tempat){
			echo '<script>alert("Tempat Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else if(!$keterangan){
			echo '<script>alert("Keterangan Tidak Boleh Kosong!"); </script>';
			echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add">';
		}else{
			if($_FILES['gambar']['size'] > 0)
			{				
					
							$sql = "UPDATE `pariwisata` SET `nama_wisata`='$nama_wisata',`tempat`='$tempat',`keterangan`='$keterangan'
									 WHERE id='$id_pariwisata'";

							if ( $conn->query($sql) === TRUE ) 
							{
								$_SESSION['status'] = "0";
								$_SESSION['pesan'] = "Data Pariwisata Berhasil Diupdate!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.detail&id=' . $id_pariwisata . '">';

							} else 
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Data Pariwisata Gagal Diupdate!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.edit&id=' . $id_pariwisata . '">';
							}
			}
			else
			{
				$sql = "UPDATE `pariwisata` SET `nama_wisata`='$nama_wisata',`tempat`='$tempat',`keterangan`='$keterangan'
						WHERE id='$id_pariwisata'";

				if ( $conn->query($sql) === TRUE ) 
				{
					$_SESSION['status'] = "0";
					$_SESSION['pesan'] = "Data Pariwisata Berhasil Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index">';

				} else 
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Data Pariwisata Gagal Diupdate!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.edit&id=' . $id_pariwisata . '">';
				}
			}	
		}	
	}

	else if(isset($_POST['delete']))
	{
		if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
			$id_pariwisata = $_POST['id'];
			$sql = "DELETE FROM pariwisata_gambar WHERE id_pariwisata = $id_pariwisata";
			$sql2 = "DELETE FROM pariwisata WHERE id = $id_pariwisata";
			$result = $conn->query($sql);
			$result2 = $conn->query($sql2);
			
			if ($result === TRUE && $result2 === TRUE)
			{
				$_SESSION['status'] = "0";
				$_SESSION['pesan'] = "Data Pariwisata Berhasil Dihapus!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index">';
			} else 
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Hapus Gambar Pariwisata Terlebih Dahulu!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index">';
			}
		}
	}

	else if(isset($_POST['add_gambar']))
	{
		
			$extension=array('jpeg','JPEG','jpg','JPG','png','PNG','gif','GIF');
			foreach ($_FILES['image']['tmp_name'] as $key => $value) 
			{
				$maxsize 		= 1024 * 1000; 
				$id_pariwisata 	= $_POST['id'];
				$filename		=$_FILES['image']['name'][$key];
				$filename_tmp	=$_FILES['image']['tmp_name'][$key];
				$ext			=pathinfo($filename,PATHINFO_EXTENSION);
				$finalimg='';
				$ukuran = $_FILES['image']['size'][$key];

				if($ukuran > $maxsize){				// 1044070					
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Gambar Terlalu Besar!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar">';				
				}else
				{
					if(in_array($ext,$extension))
						{
							
							if(!file_exists('assets/img/pariwisata/'.$filename))
							{
								move_uploaded_file($filename_tmp, 'assets/img/pariwisata/'.$filename);
								$finalimg=$filename;
							}else
							{
								$filename=str_replace('.','-',basename($filename,$ext));
								$newfilename=$filename.time().".".$ext;
								move_uploaded_file($filename_tmp, 'assets/img/pariwisata/'.$newfilename);
								$finalimg=$newfilename;
							}
							
							$creattime=date('Y-m-d h:i:s');
						
							$sql="INSERT INTO `pariwisata_gambar`( `id_pariwisata`, `gambar`, `image_createtime`) VALUES ('$id_pariwisata','$finalimg','$creattime')";
						
							if ( $conn->query($sql) === TRUE ) 
								{
									$_SESSION['status'] = "0";
									$_SESSION['pesan'] = "Gambar Pariwisata Berhasil Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index">';

								} else 
								{
									$_SESSION['status'] = "1";
									$_SESSION['pesan'] = "Gambar Pariwisata Gagal Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar">';
								}
						}else
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Ekstensi Gambar Tidak Sesuai!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar">';
							}
						
				}
			
		}

	}

	else if(isset($_POST['add_gambar_new']))
	{
		
			$extension=array('jpeg','JPEG','jpg','JPG','png','PNG','gif','GIF');
			foreach ($_FILES['image']['tmp_name'] as $key => $value) 
			{
				$maxsize 		= 1024 * 1000; 
				$id_pariwisata 	= $_POST['id'];
				$filename		=$_FILES['image']['name'][$key];
				$filename_tmp	=$_FILES['image']['tmp_name'][$key];
				$ext			=pathinfo($filename,PATHINFO_EXTENSION);
				$finalimg='';
				$ukuran = $_FILES['image']['size'][$key];

				if($ukuran > $maxsize){				// 1044070					
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Gambar Terlalu Besar!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar_new&id=' . $id["id"] . '">';			
				}else
				{
					if(in_array($ext,$extension))
						{
							
							if(!file_exists('assets/img/pariwisata/'.$filename))
							{
								move_uploaded_file($filename_tmp, 'assets/img/pariwisata/'.$filename);
								$finalimg=$filename;
							}else
							{
								$filename=str_replace('.','-',basename($filename,$ext));
								$newfilename=$filename.time().".".$ext;
								move_uploaded_file($filename_tmp, 'assets/img/pariwisata/'.$newfilename);
								$finalimg=$newfilename;
							}
							
							$creattime=date('Y-m-d h:i:s');
						
							$sql="INSERT INTO `pariwisata_gambar`( `id_pariwisata`, `gambar`, `image_createtime`) VALUES ('$id_pariwisata','$finalimg','$creattime')";
						
							if ( $conn->query($sql) === TRUE ) 
								{
									$_SESSION['status'] = "0";
									$_SESSION['pesan'] = "Gambar Pariwisata Berhasil Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index">';

								} else 
								{
									$_SESSION['status'] = "1";
									$_SESSION['pesan'] = "Gambar Pariwisata Gagal Ditambahkan!";
									echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar_new&id=' . $id["id"] . '">';
								}
						}else
							{
								$_SESSION['status'] = "1";
								$_SESSION['pesan'] = "Ekstensi Gambar Tidak Sesuai!";
								echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.add_gambar_new&id=' . $id["id"] . '">';
							}
						
				}
			
		}

	}


	else if(isset($_POST['delete_gambar']))
	{
		if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
			$id_gambar = $_POST['id'];
			$sql = "DELETE FROM pariwisata_gambar WHERE id_gambar = $id_gambar";
			if ( $conn->query($sql) === TRUE ) 
			{
				$_SESSION['status'] = "0";
				$_SESSION['pesan'] = "Data Gambar Pariwisata Berhasil Dihapus!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index_gambar">';

			} else 
			{
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Data Gambar Pariwisata Gagal Dihapus!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=pariwisata.index_gambar">';
			}
		}
	}


?>