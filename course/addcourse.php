<?php

include ("../db.php");
session_start();


    if(!isset($_SESSION['username'])){
        header("location:../index.php");
    }elseif($_SESSION['usertype']=='student'){
        header("location:../index.php");
    }

    $host ="localhost";
    $user ="root";
    $password ="";
    $db="school";


    $con = mysqli_connect($host, $user, $password, $db);
    if($con){

    }else{
      echo "Not Connected";
    }

    if(isset($_POST['add_course'])){
      $name=$_POST['name'];
      $description=$_POST['description'];
      $image = $_FILES["image"]["image"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];
      $folder = "./image/" . $image;


      $query = "insert into courses(name, description, image) values ('$name', '$description', '$image')";
      $result=mysqli_query($con,$query);
    
      if ($result){
        echo '<script>alert("successfully added"); window.location.href = "../courses.php";</script>'; 
      }else{
        echo '<script>alert("add course fail")</script>'; 
      }

      if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }

    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
    <style>
        .gradient-custom {
/* fallback for old browsers */
background: #f093fb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
       <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          
            <div class="text-center">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            </div>
            <form action="" method="POST" >

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="name" name ="name" class="form-control form-control-lg"  />
                    Name
                  </div>
  
                </div>
               
              
              </div>


              <div class="row">
               
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  Description
                    <input type="tel" id="description" name="description" class="form-control form-control-lg" width=100% />
                  
                  </div>

                </div>
              
              </div>

              <div class="row">
               
               <div class="col-md-6 mb-4 pb-2">

                 <div class="form-outline">
                 Upload image
                   <input type="file" id="image" name="image" class="form-control form-control-lg" accept =".jpg, .jpeg, .png, .gif" />
                 
                 </div>

               </div>
             
             </div>

          

              <div class="mt-4 pt-2 text-center">
                <input class="btn btn-primary btn-lg" type="submit"  name="add_course" value="Confirm" />
    

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>