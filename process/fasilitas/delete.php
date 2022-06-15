<?php
		$id	 		= $_REQUEST['id'];
		$id_jenis	= $_REQUEST['id_jenis'];
		$sql = "DELETE FROM fasilitas WHERE id = '".$id."' ";

		if ($conn->query($sql)) {
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "Data Fasilitas Berhasil Dihapus!";
			echo '<meta http-equiv="refresh" content="0; URL=?p=fasilitas.detail&id=' . $id_jenis . '">';
		}
		else
		{
            $_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Data Fasilitas Gagal Dihapus!";
			echo '<meta http-equiv="refresh" content="0; URL=?p=fasilitas.detail&id=' . $id_jenis . '">';
		}
?>