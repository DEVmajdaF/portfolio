<?php include '../db.php' ; ?>
<?php session_start(); ;?>
<?php
//Secure admin dashboard with login
if(isset($_SESSION['email']) ==true && isset($_SESSION['password']) == true ) {
     $query = "SELECT * FROM user WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'";
     $run_query = mysqli_query($conn, $query);
     if (mysqli_num_rows($run_query)==1){
     }else{
        header('location:../index.php');
     }
}else{
    header('location:../index.php');
}
?>
<!-- Getting Post Data and create image uploader -->
<?php
$image_err="";
if(isset($_POST['submit_projet'])){
    //get the data from the form
    $title=$_POST['title'];
    $date= date('Y-m-d');
    $description=addslashes($_POST['description']); // échappé tous les caractères ('/"//)
    $category=$_POST['category'];
    // Make the uploader here 
    // Check if file was uploaded
    if(isset($_FILES['image']['name'])){
        // var_dump($_FILES['image']);
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];  //le nom temporaire du fichier qui sera chargé sur la machine serveur
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image_name,PATHINFO_EXTENSION); //retourne l'extention du file
        $image_path = 'C:\wamp64\www\portfolio/images/'.$image_name;
        $image_db_path='images/'.$image_name;

        //if the image size < 1MB // Check the  file size
        if($image_size < 1000000){
            // Allow this file formats JPG/PNG/GIF
            if ($image_ext=='jpg' || $image_ext=='png' || $image_ext=='gif'){
                //move_uploaded_file déplace un fichier téléchargé
                if(move_uploaded_file($image_tmp, $image_path)){
                   
                    $sql= "INSERT INTO projects (title, description, githublink, image, date) VALUES ('$title','$description','$_POST[githublink]','$image_db_path','$date')";
                     //executer la requette 
                    $sql_run=mysqli_query($conn,$sql);
                    if($sql_run){
                        //Retourne l'identifiant automatiquement généré utilisé par la dernière requête
                        $project_id = mysqli_insert_id($conn); 
                        for ($i=0; $i<sizeof($category);$i++) {  
                            $sql1="INSERT INTO projectcat (project_id,category_id) VALUES ('$project_id','$category[$i]')";  
                            $sql_run1=mysqli_query($conn,$sql1);
                            if($sql_run1){
                                $image_err="<div class='message'>the form submitted</div>";
    
                            }else{
                                $image_err="<div class='message'>Error in the submit</div>";
    
                            }
                        }
                    }else{
                        $image_err="<div class='message'>the query not working</div>";

                    }
                }else{
                    $image_err="<div class='message'>Sorry, you cant upload the image</div>";

                }
            }else{
                $image_err="<div class='message'>the image extention dont match</div>";
            }

        }else{
            $image_err="<div class='message'>image FILE SIZE IS MUCH BIGGER THAN EXPECT </div>";
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
   

    <title>Add New Project</title>
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

        <div class="main">
            <div class="header-post"><h1>Adding New Project</h1></div>
            <?php echo  $image_err; ?>
                <div class="form">

                    <form action="new-project.php" method="post"  enctype="multipart/form-data" >         
                            <div class="form__group">
                                <label for="image" >Upload your image</label>
                                <input type="file" name="image" class="" id="image" required >
                            </div>
                            <div class="form__group">
                                <label for="title" >your project title</label>
                                <input type="text" name="title" class="" id="title" required>
                            </div>
                            <div class="form__group">
                                <label class=""  for="description">your project description</label>
                                <textarea type="text" name="description" class="" id="description" required > </textarea>
                            
                            </div>
                            <div class="form__group">
                                <label class=""  for="githublink">your project githublink</label>
                                <input type="text" name="githublink" class="" id="githublink" required>
                            
                            </div>
                            <div class="form__group">
                                <label for="category">Choose the category of your project</label>
                                <select name="category[]" id="category" required  multiple>
                                <option value="">Select Any Category </option>
                                    <?php 

                                        $sql="SELECT * FROM categories";
                                        $sql_run=mysqli_query($conn,$sql);
                                        while($rows= mysqli_fetch_assoc( $sql_run)){
                                            echo'
                                            <option value="'.$rows['id'].'"> '.$rows['name'].'</option> '
                                            ;}
                                    ?>
                                </select>
                            </div> 
                           
                            <button type="submit"  name="submit_projet" class="submit">Submit</button>
                            
                    </form>
                </div>
                
        </div> 
   </div>
</div>
    
<script src="../app/js/adminscript.js"></script>

</body>
</html>