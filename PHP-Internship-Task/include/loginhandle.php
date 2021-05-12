<?php
include'_dbconnect.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $se=0;
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
    $sql="SELECT * FROM `users` WHERE email ='$email'";
    $result=mysqli_query($conn, $sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1){
        $row=mysqli_fetch_assoc($result);
       
        }
        $uid=$row['uid'];
        print_r($uid);
         if (password_verify($pwd , $row['pwd'])) {
          
            $se=1;
            
        header("Location: ../index.php?se=$se");
    }    
    }
        header("Location: ../index.php?se=$se");
 
 ?>