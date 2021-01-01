
<?php include '../db.php' ;?>
<?php session_start(); ;?>
<!-- SESSION   -->
<?php
//Secure admin dashboard with login
if(isset($_SESSION['email']) ==true && isset($_SESSION['password']) == true ) {
     $query = "SELECT * FROM user WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'";
     $run_query =mysqli_query($conn, $query);
    //  print_r($run_query);
     if (mysqli_num_rows($run_query)==1){
     }else{
        header('location:../index.php');
     }
}else{
    header('location:../index.php');
}
?>



<!-- Delete a Row  from projects table    -->
<?php
 $image_err="";

if (isset($_GET['del_id'])){
    $query_del = "DELETE FROM projects WHERE id=".$_GET['del_id'];
    $result_del = mysqli_query($conn, $query_del);

    
  if ( $result_del) {
   $image_err= " <div class='alert'>Record deleted successfully </div>";
  } else {
   $image_err= " <div class='alert'>Error deleting record: </div>" . mysqli_error($conn);
  }

}

?>
<!-- Edit a Row from projects table   -->







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/admin.css">
    <script src="https://kit.fontawesome.com/301ecdaf47.js" crossorigin="anonymous"></script>
   

    <title><projects-Admin></projects-Admin></title>
</head>
<body>

<!-- admin Content-dashboard-->
<div class="container">
   <!-- SIDEBAR -->
    <div class="aside">
        <div class="aside__info">
            <a href="../index.php"><img src="../images/Logom.png"  width="77px" alt=""></a>
            <h2>Majda FANNAN</h2>
        </div>
        <ul class="aside__list">
            <!-- <li> <i class="fas fa-home"></i> <a href="index.php"> Home</a></li> -->
            <li> <i class="fas fa-edit"></i> <a class="project" href="project.php"> Projects</a></li>
            <li> <i class="fas fa-envelope"> </i><a href="contact.php">  Contact</a></li>
            <!-- <li> <i class="fas fa-book-open"> </i><a href=""> Skills</a></li>
            <li> <i class="fas fa-id-card"></i> <a href="">  Profile</a> </li> -->
        </ul> 
    </div>
    <!-- main content -->
    <div class="main">
          <!-- admin Header start -->
        <div class="header">
            <div class="hamburger">
                <a href="#"><i class="fas fa-bars"></i></a>
            </div>
            <div class="logout">
                <a href="../account/logout.php">LOG OUT</a>
            </div>
        </div>

        <div class="content">
            <div class="content__header">
                <div class="content_name">
                <h1>ALL PROJECT</h1>
                <a href="new-project.php"> <i class="fas fa-plus"></i> ADD PROJECT</a>

                </div>
            </div>
            <?php echo $image_err; ?>
            <div class="cards">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">image</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <?php
                            $sel_sql=" SELECT * FROM projects";
                            $run_sql= mysqli_query($conn, $sel_sql);

                            while($rows = mysqli_fetch_assoc($run_sql)){
                                echo'
                                <tbody>
                                <th scope="row">'.$rows['id'].'</th>
                                <td><img class="card__img" src="../'.$rows['image'].'" style="width:100px" alt=""></td>
                                <td>'.$rows['title'].'</td>
                                <td>'.$rows['description'].'</td>
                                <td><a href="update.php?edit_id='.$rows['id'].'"><i class="far fa-edit"></i></a></td>
                                <td><a href="project.php?del_id='.$rows['id'].'"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            </tbody>

                            ';

                            }
                    ?> 
                  
            </table>
    
            </div>



        </div>
        
       
    </div>


    
</div>



    
<script src="../app/js/adminscript.js"></script>

</body>
</html>