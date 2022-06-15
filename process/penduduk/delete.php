<?php
		$id	 = $_REQUEST['id'];
		$sql = "DELETE FROM penduduk WHERE id = '".$id."' ";

		if ($conn->query($sql)) {
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "Data Penduduk Berhasil Dihapus!";
			echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.index">';
		}
		else
		{
            $_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Data Penduduk Gagal Ditambahkan!";
			echo '<meta http-equiv="refresh" content="0;URL=?p=penduduk.index">';
		}
?>