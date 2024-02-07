<?php
session_start();

$host ="localhost";
$user ="root";
$password ="";
$db="school";

$con = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['cfmedit'])){
    $all_id = $_POST['dlt_chkbox'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;
    $query = "UPDATE courses SET name = '$name', description = '$desc', pic = '$image' WHERE id IN ($extract_id)";
    $result = mysqli_query($con, $query);

        if($result){
            echo '<script>alert("successfully edited"); window.location.href = "../courses.php";</script>'; 
        }else{
            echo '<script>alert("delete failed"); window.location.href = "../courses.php";</script>'; 
        }
    }

?>

