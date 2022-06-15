<?php
		$GetID  = $_SESSION['id'];
		$id	 = $_GET['id'];
		if($GetID === $id){
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Tidak Bisa Menghapus Admin Aktif!";
			echo '<meta http-equiv="refresh" content="0;URL=?p=user.index">';
		}
		else
		{
			$sql = "DELETE FROM user WHERE id = '".$id."' ";
			if ($conn->query($sql)) 
			{
					$_SESSION['status'] = "0";
					$_SESSION['pesan'] = "Admin Berhasil Dihapus!";
					echo '<meta http-equiv="refresh" content="0;URL=?p=user.index">';
			}
			else
			{
            	echo '<meta http-equiv="refresh" content="0;URL=?p=user.index">';
			}
		}
		
?>