<?php

if (isset($_POST['add'])) {
	$nama_organisasi	= $_POST['nama_organisasi'];
	$nama_ketua			= $_POST['nama_ketua'];
	$deskripsi			= $_POST['deskripsi'];
	$allowExt 			= array('png', 'jpg', 'jpeg');
	$fileName 			= $_FILES['img']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['img']['size'];
	$fileTemp 			= $_FILES['img']['tmp_name'];
	$upload_dir 		= "assets/img/organisasi/";
	$img 				= basename($fileName);
	$v_img				= str_replace(' ', '_', $img);

	if (!$nama_organisasi && !$nama_ketua && !$deskripsi && !$img) {
		echo '<script>alert("Nama Oganisasi, Nama Ketua dan Deskripsi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$nama_organisasi) {
		echo '<script>alert("Nama Organisasi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$nama_ketua) {
		echo '<script>alert("Nama Ketua Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$deskripsi) {
		echo '<script>alert("Deskripsi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$img) {
		echo '<script>alert("Gambar Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else {
		if ($_FILES['img']['size'] > 0) {
			if (in_array($fileExt, $allowExt) === TRUE) {
				if ($fileSize < 10044070) {
					if (move_uploaded_file($fileTemp, $upload_dir . $v_img)) {

						$sql = "INSERT INTO `organisasi`(`nama`,`ketua`, `deskripsi`, `foto`) VALUES 
												('$nama_organisasi', '$nama_ketua', '$deskripsi', '$v_img')";

						if ($conn->query($sql) === TRUE) {
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Organisasi Baru Berhasil Ditambahkan!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.index">';
						} else {
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Organisasi Baru Gagal Ditambahkan!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
						}
					} else {
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Gambar Gagal Diupload!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
					}
				} else {
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
				}
			} else {
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
			}
		} else {
			$img = "cover.jpg";
			$sql = "INSERT INTO `organisasi`(`nama`, `ketua`, `deskripsi`, `foto`) VALUES 
				('$nama_organisasi', '$nama_ketua', '$deskripsi', '$img')";

			if ($conn->query($sql) === TRUE) {
				echo '<script>alert("Data Organisasi Berhasil Disimpan"); </script>';
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.index#?id=1">';
			} else {
				echo '<script>alert("Data Organisasi Gagal Disimpan"); </script>';
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
			}
		}
	}
} else if (isset($_POST['edit'])) {
	$id_organisasi 		= $_POST['id'];
	$nama_organisasi		= $_POST['nama_organisasi'];
	$nama_ketua				= $_POST['nama_ketua'];
	$deskripsi			= $_POST['deskripsi'];
	$allowExt 			= array('png', 'jpg', 'jpeg');
	$fileName 			= $_FILES['img']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['img']['size'];
	$fileTemp 			= $_FILES['img']['tmp_name'];
	$upload_dir 		= "assets/img/organisasi/";
	$img 			= basename($fileName);
	$v_img			= str_replace(' ', '_', $img);

	if (!$nama_organisasi && !$nama_ketua && !$deskripsi) {
		echo '<script>alert("Nama organisasi, nama_ketua dan deskripsi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$nama_organisasi) {
		echo '<script>alert("Nama organisasi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$nama_ketua) {
		echo '<script>alert("nama_ketua Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else if (!$deskripsi) {
		echo '<script>alert("deskripsi Tidak Boleh Kosong!"); </script>';
		echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.add">';
	} else {
		if ($_FILES['img']['size'] > 0) {
			if (in_array($fileExt, $allowExt) === TRUE) {
				if ($fileSize < 1044070) {
					if (move_uploaded_file($fileTemp, $upload_dir . $v_img)) {

						$sql = "UPDATE `organisasi` SET `nama`='$nama_organisasi',`ketua`='$nama_ketua',`deskripsi`='$deskripsi',
									`foto`='$v_img' WHERE id='$id_organisasi'";

						if ($conn->query($sql) === TRUE) {
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "Data Organisasi Berhasil Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.detail&id=' . $id_organisasi . '">';
						} else {
							$_SESSION['status'] = "1";
							$_SESSION['pesan'] = "Data Organisasi Gagal Diupdate!";
							echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.edit&id=' . $id_organisasi . '">';
						}
					} else {
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Gambar Gagal Diupload!";
						echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.edit&id=' . $id_organisasi . '">';
					}
				} else {
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ukuran Gambar Melebihi 10 MB!";
					echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.edit&id=' . $id_organisasi . '">';
				}
			} else {
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Ekstensi Gambar Tidak Diizinkan!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.edit&id=' . $id_organisasi . '">';
			}
		} else {
			$sql = "UPDATE `organisasi` SET `nama`='$nama_organisasi',`ketua`='$nama_ketua',`deskripsi`='$deskripsi'
						WHERE id='$id_organisasi'";

			if ($conn->query($sql) === TRUE) {
				$_SESSION['status'] = "0";
				$_SESSION['pesan'] = "Data Organisasi Berhasil Diupdate!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.index">';
			} else {
				$_SESSION['status'] = "1";
				$_SESSION['pesan'] = "Data Organisasi Gagal Diupdate!";
				echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.edit&id=' . $id_organisasi . '">';
			}
		}
	}
} else if (isset($_POST['delete'])) {
	if (isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {
		$organisasi = $_POST['id'];
		$sql = "DELETE FROM organisasi WHERE id = $organisasi";
		if ($conn->query($sql) === TRUE) {
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "Data Organisasi Berhasil Dihapus!";
			echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.index">';
		} else {
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Data Organisasi Gagal Dihapus!";
			echo '<meta http-equiv="refresh" content="0; URL=?p=organisasi.index">';
		}
	}
}
