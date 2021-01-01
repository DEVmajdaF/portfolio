<?php include 'db.php' ?>
<?php
$message="";
if (isset($_POST['submit'])) {
    // receive all input values from the form
    // Protège les caractères spéciaux d'une chaîne pour l'utiliser dans une requête SQL
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subjects = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    $date= date("y.m.d");
    $sql ="INSERT INTO contact (username,email,subject,message,date) values('$username',' $email ','$subjects',' $message','$date')";
    $run_sql=mysqli_query($conn, $sql);
    if($run_sql){

        $message="<div class='message'>Your form Submitted </div>";
    }else{
        $message="<div class='message'>Eroor in you form </div>";

    }
      
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact page </title>
</head>

<body>

    <!-- Header -->
    <?php include 'includes/header.php' ?>


    <!-- body -->
    <div class="container">

    
    <h1 class="category-name">Contactez Moi</h1>

    <h1 class="text">Laissez-moi un message</h1>
     

    <form method="POST" action="contact.php">
    
    <?php echo  $message;?>
        <!-- <div class="form__info"> -->
            <div class="form__name">
                <i class="fa fa-envelope-o form__icon" aria-hidden="true"></i>
                <input type="text" class="" name="username" id="name" placeholder="Votre Nom" required>
                <span></span>
            </div>
            <div class="form__email">
                <i class="fa fa-user-o form__icon" aria-hidden="true"></i>
                <input type="email" class="" name="email" id="email" placeholder="Votre Email" required>
                <span></span>
            </div>
        <!-- </div> -->
        <div class="form__subject">
            <i class="fa fa-paperclip 2X form__icon" aria-hidden="true"></i>
            <input type="text" class="" id="subject" name="subject" placeholder="Votre Sujet" required>
            <span></span>
        </div>
        <div class="form__message">
            <textarea type="text" class="" name="message" id="subject" rows="6" placeholder="Votre Message Ici"></textarea required>
        </div>
        <div class="form__submit">
           
            <button type="submit" class="submit" name="submit">Envoyer</button>
        </div>
    </form>
    </div>

    <script src="app/js/script.js"></script>



</body>

</html>