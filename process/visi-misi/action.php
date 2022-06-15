<?php
	if (isset($_POST['edit'])) 
	{
		$visi = $_POST['visi'];
		$misi = $_POST['misi'];
		
		$sql="UPDATE profil SET visi = '$visi', misi = '$misi'";

		if ( $conn->query($sql) === TRUE ) 
		{
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "Visi-Misi Kelurahan Berhasil Diupdate!";
		 echo '<meta http-equiv="refresh" content="0;URL=?p=visi-misi.index">';
		} 
		else 
		{
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Visi-Misi Kelurahan Gagal Diupdate!";
		 echo '<meta http-equiv="refresh" content="0;URL=?p=visi-misi.index">';
		}
	}
?>