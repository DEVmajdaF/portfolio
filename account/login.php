<?php include '../db.php';
      session_start();

?>
<!--  login user information  -->
<?php

//check if the email and password are correct and log in 
if (isset($_POST['submit'])) {
    //check if note empty 
  if(!empty($_POST['email']) && !empty($_POST['password']) ){
      //receive the input value from the form
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

          // Execute the query and store the result set 
        if($results = mysqli_query($conn, $query)){
            //Returns the number of rows in the result set
            if(mysqli_num_rows($results)==1){

                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:../admin/project.php');

            }else{
                //if no row match with given criteria return false
                header('location:login.php?login_error=wrong');
            }

        }else{
            //
            header('location:login.php?login_error=query_error');

        }
    } else{
        header('location:login.php?login_error=empty');

    } 
}


//get the alert message about every login error 
$login_err='';
if(isset($_GET['login_error'])){
    if($_GET['login_error']== 'empty'){
        $login_err='<h1>Email or Password was EMPTY! </h1>';


    }elseif($_GET['login_error']== 'wrong'){
        $login_err='<h1>Email or Password was WRONG! </h1>';

    }elseif($_GET['login_error']== 'query_error'){
        $login_err='<h1> Theres somekind of  DataBase issue</h1>';

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/login.css">
    <title>LOGIN AREA</title>
</head>
<body>

    <div class="login">
        <div class="menu"> 
         <ul class="navphone ">
            <li class="navphone__items">
                <a class="navphone__link" href="../index.php">Home</a>
            </li>
            <li class="navphone__items">
                <a class="navphone__link" href="../portfolio.php">PORTFOLIO</a>
            </li>
            <li class="navphone__items">
                <a class="navphone__link" href="../about.php">About </a>
            </li>
            <li class="navphone__items">
                <a class="navphone__link" href="../contact.php">CONTACT</a>
            </li>
        </ul>
        </div>
        <div class="login__welcome">
        <img class="login__hamburger " id="hamburger" src="../images/bars-solid.svg" style="width: 25px;" alt="">

            <h1>
                Hey! <br>
                Welcome <br>
                Back
            </h1>
        </div>
        <div  class="login__enter">
            <div class="login__content">
                <img  src="images/Logom.png" alt="" width="77px">
                <?php echo  $login_err ; ?>
                <form method="post" action="login.php">
                    <div class="email">
                            <input type="email" class="" name="email" id="email" placeholder="Your Email" >
                            
                    </div>
                    <div class="password">
                            <input type="password" name="password" class="" id="paswword" placeholder="Your Paswword" >
                    </div>

                    <button type="submit" name="submit" class="submit">Connecter</button>
                  
                </form>
            </div>
        </div>
    </div>
<script src="../app/js/login.js"></script>
    
</body>
</html>