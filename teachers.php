<?php 
    include("db.php");
    include("student/deletestudent.php");
?>

<?php
 session_start();

 if(!isset($_SESSION['username'])){
    header("location:index.php");
}elseif($_SESSION['usertype']=='student'){
    header("location:index.php");
}


    $host = "localhost";
    $user = "root";
    $password= "";
    $db = "school";

    $con = mysqli_connect($host, $user, $password, $db);
    $query = "select * from student"; 
    $result = mysqli_query($con, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script defer src ="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src ="script.js"></script>
    <style type="text/css">
.table {
    margin: 0 auto;
    width: 80%;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission log</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>

  
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


            <nav class="navbar navbar-expand-lg bg-body-tertiary ">
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
                    <a class="nav-link active" href="#">FAQ</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                   

                <a class="btn btn-primary" href="adminHome.php" role="button">Back to dashboard</a>

                </form>
                </div>
            </div>
            </nav>

            <br><br><br>
 <h1 class="text-center">View teachers details</h1><br><br><br>
 
<div class ="container">
    <form action="student/deletestudent.php" method="POST">
         
            <table id ="info" class="table table-hover table-fixed mx-auto">
                <col style="width:1%"/>
                <col style="width:1%"/>
                <col style="width:15%"/>
                <col style="width:15%"/>
                <col style="width:8%"/>
                <col style="width:15%"/>
                <col style="width:10%"/>
                <col style="width:10%"/>


                <div class="text-center">
                        <a class="btn btn-primary" href="teacher/addteacher.php" role="button">Add</a>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                    </div>
              
                <thead class="table-dark">
                    <tr>
                
                    <th class="text-center border border-2" scope="col"></th>
                    <th class="text-center border border-2" scope="col">Id</th>
                    <th class="text-center border border-2" scope="col">First Name</th>
                    <th class="text-center border border-2" scope="col">Last Name</th>
                    <th class="text-center border border-2" scope="col">Gender</th>
                    <th class="text-center border border-2" scope="col">Email</th>
                    <th class="text-center border border-2" scope="col">phone</th>
                    <th class="text-center border border-2" scope="col">Date of birth</th>



                    </tr>
                </thead>
            <tbody>
            <?php 


            $con = mysqli_connect($host, $user, $password, $db);

            $query = "select * from teachers";
            $result= mysqli_query($con,$query);

            if(mysqli_num_rows($result) > 0){
                foreach($result as $row){
                    ?>
                <tr>
                    <td class="text-center border border-2"><input type="checkbox"  name="dlt_chkbox[]" value="<?= $row['id']; ?> "></td>
                    <td class="text-center border border-2"><?php echo "{$row['id']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['fname']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['lname']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['gender']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['email']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['phone']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['dob']}";?></td>

                </tr>
                    <?php 
                }
            }
            else{
                ?>
                <tr><td colspan="9">no record</td></tr>
                <?php
            }
            ?>

            

             
         
                
            </tbody>
            </table>
            </form>
          </div>
        
<!-- Modal -->







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>