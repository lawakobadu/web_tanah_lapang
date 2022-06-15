<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
        else if($_GET['pesan']=="gagal2")
        {
            echo "<div class='alert'>Silahkan login terlebih dahulu !</div>";
        }
        else if($_GET['pesan']=="sukses")
        {
            echo "<div class='success'>Registrasi berhasil ! Silahkan login terlebih dahulu !</div>";
        }
    }
 ?>
<body style="background-image:linear-gradient(rgba(55, 52, 169, 0.6), rgba(55, 52, 169, 0.6)),url(images/cover.jpg); background-repeat:no; overflow:hidden; background-size:cover;">
    <div class="container" style="width:380px; margin: auto;">
    <div class="header" class="input center search">
        <div class="form-box" style="color:white;display:inline-block; margin-top:120px">
            <h2>Welcome, </h2>
            <p>ADMIN WEBSITE KELURAHAN TANAH LAPANG</p>
            <form role="form" method="post" action="auth.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input class="form-control" name="uname" type="text" placeholder="Username" autocomplete="off" maxlength="32" autofocus required/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input class="form-control" name="pass" type="password" placeholder="Password" autocomplete="off" maxlength="32" required/>
                </div>
                <center><button type="submit" name="login" class="btn" style="width:60%; border-radius:20px; background-color: #FF7F5C; color: #FBFBFB; background: #FF7F5C">Login</button></center> 
                <center><a href="index.php" class="btn" style="width:60%; border-radius:20px; background-color:white;color:#FF7F5C; margin-top:7px;" >Kembali</a></button></center>  
            </form>
            
        </div>
    </div>
    </div>
</body>
</html>