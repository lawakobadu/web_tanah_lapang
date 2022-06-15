<?php

if(isset($_POST['add']))
{
	$uname 	= mysqli_real_escape_string($conn, $_POST["uname"]);  
    $pass 	= mysqli_real_escape_string($conn, $_POST["pass"]);
	//level diberi manual, bisa diganti jadi user atau admin
	$role 	= "admin";
	$nama	=$_POST["nama"];
	$nip	=$_POST["nip"];
	$jabatan	=$_POST["jabatan"];
	$nohp	=$_POST["nohp"];
	$alamat	=$_POST["alamat"];
	$fotos = $_POST["foto"];

	

	$allowExt 			= array('png', 'jpg', 'jpeg');
	$fileName 			= $_FILES['foto']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['foto']['size'];
	$fileTemp 			= $_FILES['foto']['tmp_name'];
	$upload_dir 		= "assets/img/admin/";
	$foto 				= basename($fileName);
	$v_foto				= str_replace(' ','_',$foto);


	if (!empty($uname)) 
	{
		$sql = "SELECT*FROM user WHERE uname = '$uname'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		if ($row['uname'] != $uname)
		{
			
				if(in_array( $fileExt, $allowExt ) === TRUE)
				{
					if( $fileSize < 10044070 )
					{
						if (move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
						{
							$password = password_hash($pass, PASSWORD_DEFAULT);  
    						$sql = "INSERT INTO user (uname, pass, role, nama, nip, jabatan, nohp, alamat, foto) VALUES ('$uname', '$password', '$role','$nama',$nip,'$jabatan','$nohp','$alamat','$v_foto')"; 

							if ($conn->query($sql) === TRUE)
							{	
								$_SESSION['status'] = "0";
								$_SESSION['pesan'] = "User Baru Berhasil Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.index">';
							}
							else
							{
								$_SESSION['status'] = "0";
								$_SESSION['pesan'] = "User Baru Gagal Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
							}	
						}
						else
						{
							$_SESSION['status'] = "0";
							$_SESSION['pesan'] = "User Baru Gagal Ditambahkan!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
						}
					}
					else
					{
						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Ukuran Foto Melebihi 5 MB!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
					}
				}
				else
				{
					$_SESSION['status'] = "1";
					$_SESSION['pesan'] = "Ekstensi Foto Tidak Diizinkan!";
					echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
				}
		}
		else
		{
			$_SESSION['status'] = "1";
			$_SESSION['pesan'] = "Username Sudah Digunakan!";
			echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
		}
	} 
	else
	{
		$_SESSION['status'] = "1";
		$_SESSION['pesan'] = "Username dan Passord Tidak Boleh Kosong!";
			echo '<meta http-equiv="refresh" content="0;URL=?p=user.add">';
	}
	
}
if(isset($_POST['editpass']))
{
	$id=$_POST['id'];
	$uname=$_POST['uname'];	
	$pass1=$_POST['pass1']; //pass lama
 	$pass2=$_POST['pass2']; // pass
 	$cekpass=$_POST['cekpass'];

	if(!empty($pass1) && !empty($pass2) && !empty($cekpass))
  	{
  		if($pass2 == $cekpass)
  		{
  			if($pass1 != $pass2)
  			{
  				$sql="SELECT pass FROM user WHERE uname ='$uname'";
 				$cek=$conn->query($sql);
 				if(password_verify($pass1,$cek->fetch_assoc()['pass']))
 				{
 					$password = password_hash($pass2, PASSWORD_DEFAULT);
 					$fetch=$conn->query("UPDATE user SET pass = '$password' WHERE uname='$uname'");
 					if($fetch)
 					{
 						$_SESSION['status'] = "0";
						$_SESSION['pesan'] = "Kata Sandi Berhasil Diubah!";
						
						echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
 					}
 					else
 					{
 						$_SESSION['status'] = "1";
						$_SESSION['pesan'] = "Kata Sandi Gagal Diubah!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
 					}
 				}
 				else
 				{
 					$_SESSION['status'] = "2";
					$_SESSION['pesan'] = "Kata Sandi Lama Salah!";
					echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
 				}
  			}
  			else
  			{
  				$_SESSION['status'] = "2";
				$_SESSION['pesan'] = "Kata Sandi Baru Tidak Boleh Sama Dengan Yang Lama!";
				
				echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
  			}
  		}
  		else
  		{
  			$_SESSION['status'] = "2";
			$_SESSION['pesan'] = "Konfirmasi Kata Sandi Tidak Cocok!";
			
			echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
  		}
  	}
  	else
  	{
  		$_SESSION['status'] = "2";
		$_SESSION['pesan'] = "Lengkapi Data!";
		echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
  	}

	
} 
else if(isset($_POST['edit']))
{
	$uname 	= $_POST["uname"];
	$role 	= "admin";
	$nama	=$_POST["nama"];
	$nip	=$_POST["nip"];
	$jabatan=$_POST["jabatan"];
	$nohp	=$_POST["nohp"];
	$alamat	=$_POST["alamat"];
	$id		=$_POST["id"];
	$ft 	=$_POST["foto"];

	$allowExt 			= array('png', 'jpg', 'jpeg');
	$fileName 			= $_FILES['foto']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['foto']['size'];
	$fileTemp 			= $_FILES['foto']['tmp_name'];
	$upload_dir 		= "assets/img/admin/";
	$foto 				= basename($fileName);
	$v_foto				= str_replace(' ','_',$foto);

	if($_FILES['foto']['size'] > 0)
	{		
				if(in_array( $fileExt, $allowExt ) === TRUE)
				{
					if( $fileSize < 5044070 )
					{
						if (move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
						{
							  
    						$sql = "UPDATE user SET
								uname		= '$uname',
								nama 	    = '$nama',
								nip 		= $nip,
								jabatan 	= '$jabatan',
								nohp 		= '$nohp',
								alamat      = '$alamat',
								foto		= '$v_foto'
								WHERE id 	= $id";

							if ($conn->query($sql) === TRUE)
							{	
								$_SESSION['status'] = "3";
								$_SESSION['pesan'] = "Data Admin Berhasil Diupdate!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
							}
							else
							{
								$_SESSION['status'] = "4";
								$_SESSION['pesan'] = "Data Admin Gagal Diupdate!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.edit&id=' . $id . '">';
							}	
						}
						else
						{
							$_SESSION['status'] = "4";
							$_SESSION['pesan'] = "Data Admin Gagal Diupdate!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.edit&id=' . $id . '">';
						}
					}
					else
					{
						$_SESSION['status'] = "5";
						$_SESSION['pesan'] = "Ukuran Foto Melebihi 5 MB!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=user.edit&id=' . $id . '">';
					}
				}
				else
				{
					$_SESSION['status'] = "5";
						$_SESSION['pesan'] = "Ukuran Foto Melebihi 5 MB!";
						echo '<meta http-equiv="refresh" content="0;URL=?p=user.edit&id=' . $id . '">';
				}
	}
	else
	{
		$sql = "UPDATE user SET
								uname		= '$uname',
								nama 	    = '$nama',
								nip 		= $nip,
								jabatan 	= '$jabatan',
								nohp 		= '$nohp',
								alamat      = '$alamat'
								WHERE id 	= $id";

							if ($conn->query($sql) === TRUE)
							{	
								$_SESSION['status'] = "3";
								$_SESSION['pesan'] = "Data Admin Berhasil Diupdate!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.detail&id=' . $id . '">';
							}
							else
							{
								$_SESSION['status'] = "4";
								$_SESSION['pesan'] = "Data Admin Gagal Diupdate!";
								echo '<meta http-equiv="refresh" content="0;URL=?p=user.edit&id=' . $id . '">';
							}	
						}			
}
