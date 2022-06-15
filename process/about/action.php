<?php
	if (isset($_POST['edit'])) 
	{
	
		$alamat 	= $_POST['alamat'];
		$nohp 		= $_POST['nohp'];
		$email	 	= $_POST['email'];
		$whatsapp	= $_POST['whatsapp'];
		$desk	= $_POST['desk'];

		
		$sql="UPDATE profil SET alamat = '$alamat', nohp = '$nohp', email='$email', whatsapp = '$whatsapp', desk='$desk'";

		if ( $conn->query($sql) === TRUE ) 
		{
			$_SESSION['status'] = "0";
			$_SESSION['pesan'] = "About Berhasil di Update!";
		 	echo '<meta http-equiv="refresh"content="0;URL=?p=about.index">';
		}else 
		{
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "About Gagal di Update!";
		 	echo '<meta http-equiv="refresh"content="0;URL=?p=about.index">';
		}
	}
?>