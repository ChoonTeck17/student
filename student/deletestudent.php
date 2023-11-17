<?php

include('../db.php');

session_start();

$con = mysqli_connect($host, $user, $password, $db);


if(isset($_POST['delete'])){
    $all_id = $_POST['dlt_chkbox'];
    $extract_id = implode(',',$all_id);

    $query = "delete from student where id IN  ($extract_id)";
    $result= mysqli_query($con,$query);


    if($result){
        $_SESSION['status'] = "data deleted successfully";
    }else{
        $_SESSION['status'] = "data no delete";

    }
}
?>

