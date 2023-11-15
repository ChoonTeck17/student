<?php
session_start();

    if(!isset($_SESSION['username'])){
        header("location:index.php");
    }elseif($_SESSION['usertype']=='admin'){
        header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
    
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                <br>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
            
                        <a class="btn btn-secondary" href="admission.php" role="button">Admission</a>

                    </li>
                    <br>  <br>
                    <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="resultsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View results
                        </button>
                            
                    </div>
                    </li>
                    <br>  <br>
                    <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="coursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View courses
                        </button>
                          
                    </div>
                    </li>
                    <br>  <br>
                    <li>
                  
                    </li>
                  
                </ul>
                <div class="btn-group dropup">
                    
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="image/gojo.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">

                    <span class="d-none d-sm-inline mx-1">asdsa</span>
                    </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="logout.php">Log Out</a>                       
                        </div>
                </div> <br> <br>
                
            </div>
            
        </div>
   
                  
    </div>

    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>