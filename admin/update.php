
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
<!-- EDIT A ROW FROM PROJECT TABLE -->
<?php
/////////Get the information from the table///////////
if(isset($_GET['edit_id'])){
    $query_edit ="SELECT * FROM projects WHERE id=".$_GET['edit_id'];
  $result_edit=mysqli_query($conn, $query_edit);
   while($row = mysqli_fetch_assoc($result_edit)){
       $image=$row['image'];
       $title=$row['title'];
       $description=$row['description'];
   }

} else{
    $image='';
    $title='';
    $description='';
};
 
?>
<?php
/////////////Update ROW////////////////////
$image_err="";
if(isset($_POST['update'])){
    $title_post=$_POST['title'];
    $date= date('Y-m-d ');
    $description_post=addslashes($_POST['description']);
    // Make the uploader here 
    if(isset($_FILES['image']['name'])){

        // print_r($_FILES['image']);

        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
        $image_path = 'C:\wamp64\www\portfolio/images/'.$image_name;
        $image_db_path='images/'.$image_name;

        if($image_size < 1000000){
            if ($image_ext=='jpg' || $image_ext=='png' || $image_ext=='gif'){
                
                if(move_uploaded_file($image_tmp, $image_path)){
                    $sql= "UPDATE projects SET title ='$title_post' , description='$description_post' , image='$image_db_path', date=' $date' WHERE id='$_GET[edit_id]'";
                    $sql_run = mysqli_query($conn,$sql);
                    if($sql_run){
                        $image_err="the form submitted";

                    }else{
                        $image_err="the query not working";

                    }
                }else{
                    $image_err="Sorry, you cant upload the image";

                }
            }else{
                $image_err="the image extention dont match";
            }

        }else{
            $image_err="image FILE SIZE IS MUCH BIGGER THAN EXPECT";
        }
    }
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
            <div>
            <div class="main">
            <div class="header-post"><h1>Update your project</h1></div>

                 <?php echo $image_err ; ?>
                <div class="form">
                   <form action="#" method="post" enctype="multipart/form-data" >
                        <div class="form__group">
                            <label for="image">Upload Your image</label>
                            <input type="file" id="image" name="image" value="<?php echo $image;?>">
                            
                        </div>
                        <div class="form__group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="<?php echo $title; ?>">
                        </div>
                        <div class="form__group">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description"><?php echo $description;?></textarea>
                        </div>
                        <button type="submit" name="update" >Update Now</button>

                    </form>
                   
                </div>
                
        </div> 
            </div>


        </div>
        
       
    </div>


    
</div>



    
<script src="../app/js/adminscript.js"></script>

</body>
</html>