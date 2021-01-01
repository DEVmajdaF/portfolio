<?php include '../db.php' ;?>
<?php session_start(); ;?>

<?php
//Secure admin dashboard with login
if(isset($_SESSION['email']) ==true && isset($_SESSION['password']) == true ) {
     $query = "SELECT * FROM user WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'";
     $run_query =mysqli_query($conn, $query);
     if (mysqli_num_rows($run_query)==1){

     }else{
        header('location:../index.php');
     }

}else{
    header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/admin.css">
    <script src="https://kit.fontawesome.com/301ecdaf47.js" crossorigin="anonymous"></script>
   

    <title>ADMIN</title>
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
            <li> <i class="fas fa-envelope"> </i><a href="">  Contact</a></li>
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
                    <h1>ALL Contact Message</h1>
                </div>
            </div>
            <div class="cards">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usearname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">date</th>
                        </tr>
                    </thead>
                    <?php
                            $sel_sql=" SELECT * FROM contact";
                            $run_sql= mysqli_query($conn, $sel_sql);

                            while($rows = mysqli_fetch_assoc($run_sql)){
                                echo'
                                <tbody>
                                <th scope="row">'.$rows['id'].'</th>
                                <td>'.$rows['username'].'</td>
                                <td>'.$rows['email'].'</td>
                                <td>'.$rows['subject'].'</td>
                                <td>'.$rows['message'].'</td>
                                <td>'.$rows['date'].'</td>
   
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