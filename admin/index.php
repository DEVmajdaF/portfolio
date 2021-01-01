
<?php include '../db.php' ;?>
<?php session_start(); ;?>

<?php
//Securité 
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
            <!-- <?php //echo $_SESSION['email']; ?> -->
        </div>
        <ul class="aside__list">
            <!-- <li> <i class="fas fa-home"></i> <a class="aside__link" href="index.php"> Home</a></li> -->
            <li> <i class="fas fa-edit"></i> <a  href="project.php"> Projects</a></li>
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
    </div>
</div>   
<script src="../app/js/adminscript.js"></script>

</body>
</html>