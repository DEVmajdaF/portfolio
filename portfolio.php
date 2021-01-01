<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/portfolio.css">
    <title>portfolio page</title>
</head>

<body>
    <!-- header -->
    <?php include 'includes/header.php' ?>

    


    <!-- Body -->
    <div class="container">
    <h1 class="category-name">Portfolio</h1>
    
    <div class="head">
        <ul class="head__choice">
        <?php

            $sql_cat="SELECT * FROM categories";
            $run_cat=mysqli_query($conn,$sql_cat); // Exécute une requête sur la base de données
            while($rows= mysqli_fetch_assoc($run_cat)){
                //print_r($rows) ;
                echo'
                <li> <a href="portfolio.php?ctg_name='.$rows['name'].'"">'.$rows['name'].'</a> </li> ' //ctg_name paramettre => valeur de paramettre
                ;}

        ?>
            <!-- <li><a href="">Design</a></li>
            <li><a href="">frontend</a></li>
            <li><a href="">Backend</a></li> -->
        </ul>
        <div class="head__title">
            <h2>Featured works</h2>
        </div>
    </div>


    <div class="container">
    <?php
  
         if(isset($_GET['ctg_name'])){

                    $sel_sql="SELECT * FROM projects INNER JOIN projectcat ON projects.id =projectcat.project_id  INNER JOIN categories ON categories.id =projectcat.category_id WHERE categories.name= '$_GET[ctg_name]'";
                    $run_sql= mysqli_query($conn, $sel_sql);
                    while($rows = mysqli_fetch_assoc($run_sql)){
                 
                        echo'
                        
                         
                        <div class="card">
                           <img class="card__img" src="'.$rows['image'].'" style="width:400px" alt="">
                          <div class="card__info">
                              <h1 class="card__title">'.$rows['title'].'</h1>
                              <p class="card__text">'.$rows['description'].'</p>
                              <a href="'.$rows['githublink'].'" class="card__link" href="">Github Link</a>
                              
                          </div>
                        </div> ';
          }}else{

            $sel_sql=" SELECT * FROM projects";
            $run_sql= mysqli_query($conn, $sel_sql);

            while($rows = mysqli_fetch_assoc($run_sql)){
                // var_dump($rows['id']);
                
                echo'

                <div class="card">

                <img class="card__img" src="'.$rows['image'].'" style="width:400px" alt="">
                <div class="card__info">
                    <h1 class="card__title">'.$rows['title'].'</h1>
                    <p class="card__text">'.$rows['description'].'</p>
                    <a href="'.$rows['githublink'].'" class="card__link" href="">Github Link</a>
                </div>
                </div>';
            }
        }
        ?>   
        
      
   
    <!-- <div class="next">
        <a href="">Next</a>
    </div> -->
    </div>

    <script src="app/js/script.js"></script>
 

</body>

</html>


