<?php

error_reporting(0);
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

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $query = "select * from student where username ='".$username."' and password ='".$password."' ";

        $result= mysqli_query($con,$query);

        $row=mysqli_fetch_array($result);

       if($row["usertype"]=="student"){

        $_SESSION['username']=$username;
        $_SESSION['usertype']="student";
        header("location:studentHome.php");
        
       }elseif($row["usertype"]=="admin"){

        $_SESSION['username']=$username;
        $_SESSION['usertype']="admin";
        header("location:adminHome.php");

       }else{

        session_start();
        $message = "username or password no match";
        $_SESSION['loginMessage']=$message;
        header("location:index.php");
       }



    }
?>