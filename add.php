<?php

session_start();

$host ="localhost";
$user ="root";
$password ="";
$db="school";


$con = mysqli_connect($host, $user, $password, $db);
if($con){
	
}else{
	echo "Not Connected";
}


 if(isset($_POST['apply']))
 {
     $add_name = $_POST['name'];
     $add_email = $_POST['email'];
     $add_phone = $_POST['phone'];
     $add_message = $_POST['message'];
     
     $query="insert into admission (name, email, phone, message) values ('$add_name','$add_email','$add_phone','$add_message') ";
     $result=mysqli_query($con,$query);

     if ($result){

        $_SESSION['message'] = "your application has been sent";
        header("location:index.php");
     }else{
         echo "apply no success";
     }
 }
?>