<?php
	if (isset($_POST['edit'])) 
	{
		$sejarah = $_POST['sejarah'];
		
		$sql="UPDATE profil SET sejarah = '$sejarah'";

		if ( $conn->query($sql) === TRUE ) 
		{
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "Sejarah Kelurahan Berhasil Diupdate!";
								
		 	echo '<meta http-equiv="refresh" content="0;URL=?p=sejarah.index">';
		} else 
		{
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Sejarah Kelurahan Gagal Diupdate!";
								
		 	echo '<meta http-equiv="refresh" content="0;URL=?p=sejarah.index">';
		}
	}
?>