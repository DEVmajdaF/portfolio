<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/portfolio.css">
    <link rel="stylesheet" href="dist/css/project.css">
    <title>portfolio page</title>
</head>

<body>
    <!-- header -->
    <?php include 'includes/header.php' ?>

    


    <!-- Body -->

    <div class="container">
    
        <div class="project">
            <?php

            if(isset($_GET['project_id'])){

                $sel_sql=" SELECT * FROM projects WHERE id = '$_GET[project_id]'";
                $run_sql= mysqli_query($conn, $sel_sql);
      
                while($rows = mysqli_fetch_assoc($run_sql)){
                    echo'

                        <div class="project__contennu">
                            <div class="project__description">
                                 <h1 class="project__title">'.$rows['title'].'</h1>
                                 <p class="project__text">'.$rows['description'].'</p>
                            </div>
                            <div class="">
                            
                                <a class="project__link" href="'.$rows['githublink'].'" >Github Link</a>
                            </div>
                        </div>
                        <div class="project__img">
                            <img class="card__img" src="'.$rows['image'].'"  alt="">
                        </div> ';
                    
                    
            }}
            ?>
        </div>
    </div>
</body>

</html>