<?php

 if($_SERVER["REQUEST_METHOD"]=="POST"){
     include'_dbconnect.php';
     $name=mysqli_real_escape_string($conn, $_POST['name'] );
     $email=mysqli_real_escape_string($conn, $_POST['email'] );
     $pwd=mysqli_real_escape_string($conn, $_POST['pwd']) ;        
     $cpwd=mysqli_real_escape_string($conn, $_POST['cpwd'] );
     $exisql="SELECT * FROM `users` WHERE name = '$name'";
     
     $result=mysqli_query($conn,$exisql);
     $numrows=mysqli_num_rows($result);

   
     if($numrows>0){
         echo"Username/Email already in use";
     }
     else {
         if($pwd==$cpwd) {
           $hash=password_hash($pwd, PASSWORD_DEFAULT);
           $sql="INSERT INTO `users` ( `name`, `email`, `pwd`, `dt`) VALUES ('$name', '$email', '$hash', current_timestamp());" ;
           $result=mysqli_query($conn,$sql);
       
           if($result==1){
         
               header("Location:http://127.0.0.1/PHP-Internship-Task/index.php?success=1");
               exit();
           }
         }
         else{
             $showerr="Password do not match, make sure you entered your password in both fields";
             
         }
     }
     header("Location:http://127.0.0.1/PHP-Internship-Task/index.php?success=0");
    
 }





?>