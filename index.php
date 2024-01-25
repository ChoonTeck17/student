<?php
    include("db.php");
        $nameErr ="";
        $passErr ="";

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if(empty($username)){
                $nameErr="name is required";
            }
           }

?>

<?php

    
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message']){
        $message = $_SESSION['message'];

        echo "<script type= 'text/javascript'> 
         alert ('$message');
                </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
  margin-top:80px!important;
  margin-right:50px!important;

  }
    </style>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="static/faq.php">FAQ</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#register">
            Register here
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
            Login
        </button>      
    </form>
    </div>
  </div>
</nav>

    <div class ="section 1">

        <!-- <label class="random">T1 WIN WORLDS PLS</label> -->
        <img class="main" src ="image/gojo.jpg">
    </div>

    <div class="text-center">


    <!-- popout -->

    </div>
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-center w-100" id="exampleModalLabel">Admission form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="db.php" method="POST">

        <label for="username">Username</label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" aria-describedby="basic-addon3">
        <span style="color:red;"><?php echo $nameErr ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>
            <a href ="forgotPass.php">Forgot password?</a><br>
        </div>
        <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            <h4 class="text-danger  text-center w-100">
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?>
            </h4>
             
            </div>
        </div>

        </form>
            </div>
          
            </div>
        </div>
    

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img2" src ="image/gojo.jpg">
            </div>
            <div class="col-md-8">
                <h1>Welcome to Apex University</h1>
                <p>Apex University of Management & Technology, abbreviated AU, is a non-profit, private university in Malaysia.
                     Named after electronic arts inc, the school was founded in 1969 by Philip Dosen. </p>
            </div>
        </div>
    </div>

    <center>
        <h1>Our lecturers</h1>
    </center>

    <div class ="container py-5">
    <div class ="row mt-4">

    <?php
$con = mysqli_connect($host, $user, $password, $db);
$query = "select * from teachers";
$result= mysqli_query($con,$query);
$result1= mysqli_num_rows($result);

if($result1){
    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body shadow p-4 mb-4 bg-white ">
                        <img src ="image/<?php echo "{$row['image']}";?>" class="card-img-top" alt="faculty image">
                        <h4 class="card-title"><?php echo "{$row['fname']} {$row['lname']}";?></h4>
                    </div>
                </div>
            </div>
            <?php
    }
}

else{
    echo "no found";
}

?>
    </div>
</div>
   

    <center>
        <h1>our courses</h1>
    </center>




<br>
<!-- Button trigger modal -->
<div class="text-center">

</div>

<!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-center w-100 " id="exampleModalLabel">Admission form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <form action ="addAdmission.php" method ="POST">

        <label for="basic-url">Username</label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">@</span>
        </div>
        <input type="text" class="form-control"  name ="name" placeholder="Enter username" aria-describedby="basic-addon3">
        </div>

        <label for="basic-url">Email</label>
        <div class="input-group mb-3">
        <input type="text" class="form-control" name ="email" placeholder="Enter email" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>

        </div>
        <div class="form-group">
            <label for="phone">Phone num</label>
            <input type="number" class="form-control" name="phone" id="email" placeholder="enter phone num">
        </div>
        <br>
        <div class="form-group">
            <label for="msg">Message</label>
            <textarea class="form-control" id="msg" name="message" rows="3"></textarea>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="apply">Apply</button>
            </div>
        </form>
            </div>
          
            </div>
        </div>
    </div>

<div class ="container py-5">
    <div class ="row mt-4">

    <?php
$con = mysqli_connect($host, $user, $password, $db);
$query = "select * from courses";
$result= mysqli_query($con,$query);
$result1= mysqli_num_rows($result);

if($result1){
    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body shadow p-4 mb-4 bg-white ">
                        <img src ="image/course/<?php echo "{$row['image']}";?>" class="card-img-top" alt="faculty image">
                        <h4 class="card-title"><?php echo "{$row['name']}";?></h4>
                        <p class="card-text"><?php echo "{$row['description']}";?></p>                    
                    </div>
                </div>
            </div>
            <?php
    }
}

else{
    echo "no found";
}

?>
    </div>
</div>


    <?php include('footer.php'); ?>

</body>
</html>