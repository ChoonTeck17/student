<?php
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

    if(isset($_POST['add_teacher'])){
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $user_email=$_POST['email'];
      $user_phone=$_POST['phone'];
      $user_gender=$_POST['gender'];
      $user_dob=$_POST['dob'];
      $image = time().$_FILES["img"]['name'];
      if(move_uploaded_file($_FILES['pic']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/student/image/course/'.$image))
      {
        $target_file =  $_SERVER['DOCUMENT_ROOT']. '/student/image/course'.$image;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $picname = basename($_FILES['pic']['name']);
        $photo = time().$picname;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            ?>
            <script>
              alert ("pls use correct photo format");
            </script>
            <?php 
        } else if($_FILES["pic"]["size"]>4000000){
          ?>
            <script>
              alert ("pic too big");
            </script>
            <?php 
        } else{
          $pic_upload = 1;
        }
      }

      $query = "insert into teachers(fname, lname, email, phone, gender, dob, created) values ('$fname', '$lname', '$user_email', '$user_phone', '$user_gender', '$user_dob', CURRENT_TIMESTAMP)";
      $result=mysqli_query($con,$query);
    
      if ($result){
        echo '<script>alert("successfully added"); window.location.href = "../teachers.php";</script>'; 
      }else{
        echo '<script>alert("add teacher fail")</script>'; 
        
      }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
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
                    <input type="text" id="firstName" name ="fname" class="form-control form-control-lg"  />
                    First Name
                  </div>
  
                </div>
                <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <input type="text" id="lastName" name ="lname" class="form-control form-control-lg"  />
                  Last Name
                </div>

                </div>
                <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <input type="text" id="username" name ="username" class="form-control form-control-lg" />
                  Username
                </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                <div class="form-outline">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" />
                  Email               
                 </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" name="dob" id="dob"  />
                    Birthday
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="male"   />
                    Male
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="female" />
                    Female
                  </div>

               

                </div>
              </div>

              <div class="row">
               
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phone" name="phone" class="form-control form-control-lg"  maxlength="15" />
                  Phone number
                  </div>

                </div>
              
              </div>

          

              <div class="mt-4 pt-2 text-center">
                <input class="btn btn-primary btn-lg" type="submit"  name="add_teacher" value="Confirm" />
    

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