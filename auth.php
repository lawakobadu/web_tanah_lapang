<?php

session_start(); 
require ('./connect.php');

    if (isset($_POST['login'])) 
    {
        
        $uname = mysqli_real_escape_string($conn, $_POST["uname"]);  
        $pass = mysqli_real_escape_string($conn, $_POST["pass"]); 

        $query = mysqli_query($conn, "SELECT * FROM user WHERE uname = '$uname'");  
        $result = mysqli_fetch_assoc($query);      
        $r=$result['role'];
        echo "$r";
           
        if(password_verify($pass, $result["pass"]))  
        {
            if($result['role']=="admin")
            {
                $_SESSION['uname'] = $uname;
                $_SESSION['role'] = "admin";
                $_SESSION['id']= $result['id'];
                $_SESSION['nama']= $result['nama'];
                echo('<script>alert("Registrasi berhasil, silahkan login"); </script>');
                header("location:main.php"); 
            }
        }
        else
        {
        //jika gagal diarahkan kembali ke login dengan pesan 
        header("location:login.php?pesan=gagal");  
        } 
            
       
 }

    

        
       
   ?>