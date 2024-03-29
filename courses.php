<?php 
    include("db.php");
    
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
    $query = "select * from users"; 
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
    <title>Courses log</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    crossorigin="anonymous">
  
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


      
            <br><br><br>
 <h1 class="text-center">View course details</h1><br><br><br>
<div class ="container">
    <form action="course/deletecourse.php" method="POST">
         
            <table id ="info" class="table table-hover table-fixed mx-auto">
                <col style="width:6%"/>
                <col style="width:10%"/>
                <col style="width:15%"/>
                <col style="width:6%"/>



                <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" data-toggle="modal" data-target="#addcourse"><i class="fa-solid fa-plus me-1"></i>Add</button>
                        <!-- <a class="btn btn-success me-2" href="course/addcourse.php" role="button">Add</a> -->
                        <button onclick="window.print();" class="btn btn-primary" id="print-btn" >Print</button>
                </div>
              <!-- add course modal -->
              <div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline">
                        Name
                        <input type="text" id="name" name ="name" class="form-control form-control-lg"  />
                        </div><br>
                        <div class="form-outline">
                        Description
                            <input type="tel" id="description" name="description" class="form-control form-control-lg" width=100% />  
                        </div><br>
                        <div class="form-outline">
                        Upload image
                        <input type="file" name="pic" id="pic" accept =".jpg, .jpeg, .png, .gif" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                    </div>
                </div>
                </div>

                <thead class="table-dark">
                    <tr>
                
                    <th class="text-center border border-2" scope="col">Name</th>
                    <th class="text-center border border-2" scope="col">Description</th>
                    <th class="text-center border border-2" scope="col">Course image</th>
                    <th class="text-center border border-2" scope="col">Actions</th>





                    </tr>
                </thead>
            <tbody>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST"  enctype="multipart/form-data">

                        <input type="hidden" id="id2" name ="id" class="form-control form-control-lg text-center"  />

                        <div class="row justify-content-center">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            Name
                            <input type="text" id="name2" name ="name" class="form-control form-control-lg text-center"  />
                            </div>
                        </div>              
                        </div>
                        <div class="row  justify-content-center">
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                            Description
                            <input type="tel" id="description2" name="description" class="form-control form-control-lg" width=100% />  
                            </div>
                        </div> 
                        </div>
                        <div class="row  justify-content-center">
                        <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                            <input type="file" name="pic" id="pic2" accept =".jpg, .jpeg, .png, .gif" value="">
                        </div>
                        </div>           
                        </div>
                        <div class="mt-4 pt-2 text-center">
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input  class="btn btn-primary " type="submit" name="cfmedit" value="Confirm" >
                    </div>
                    </div>
                </div>
            </div>
            <?php 


            $con = mysqli_connect($host, $user, $password, $db);

            $query = "select * from courses";
            $result= mysqli_query($con,$query);

            if(mysqli_num_rows($result) > 0){
                foreach($result as $row){
                    ?>
                <tr>
                    <td class="text-center border border-2"><?php echo "{$row['name']}";?></td>
                    <td class="text-center border border-2"><?php echo "{$row['description']}";?></td>
                    <td class="text-center border border-2"><img width="60%" src="image/course/<?php echo $row['image']; ?>">
                    <td class="text-center border border-2">
                            <button type="button" class="btn btn-warning me-2" data-bs-dismiss="modal" data-toggle="modal" data-target="#edit"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-toggle="modal" data-target="#delete"><i class="fa-solid fa-trash me-1"></i>Delete</button>
                    </td>




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