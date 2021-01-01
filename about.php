<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/about.css">
    <script src="https://kit.fontawesome.com/301ecdaf47.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php' ?>

    <!-- Body -->
   
    <div class="container">

        <div class="about">
               
                <div class="about__text">
                    <p>Je suis motivéé, travailleuse, honnéte et préte à relever<br> les challenges professionnels.Ma formation et mes experiences<br> m’ont permis de développer la capacité d’adaptation aux differents<br> environements professionnels, ainsi que
                    l’ouverture d’esprit et l’organisation.</p>
                    <div class="about__social">
                        <a href="https://www.facebook.com/majda.artista.3"> <img src="images/fb.png" alt="" ></a> 
                        <!-- <a href=""> <img src="images/ins.png" alt="" ></a>  -->
                        <a href="https://www.linkedin.com/in/majda-fannan-030640110/"> <img src="images/in.png" alt="" ></a> 
                   
                    </div>
                </div>
        </div>
        <div class="skils">
        <h1>SKILLS</h1>
            <ul class="skills_1">
            <?php  

            $sql="SELECT * FROM skills";
            $sql_query=mysqli_query($conn,$sql);

            while($rows=mysqli_fetch_assoc($sql_query)){

                echo'
                <li><a href="">'.$rows['name'].'</a> </li>
                
                ';

            }  
            ?>
           
            </ul>

        </div>
       
        <div class="ex">
            <h1 class="title">FORMATION</h1>
            <div class="timeline">
                <div class="container left">
                        <div class="content">
                            <H1>YOUCODE-YOUSSOUFIA</h1>
                            <p>DEVELOPPEMENT WEB</p>
                            <h2>2019 - 2021</h2>
                        </div>
                </div>
                <div class="container right">
                        <div class="content">
                            <h1>ISTA 1-SAFI</h1>
                            <p>Technicien Spécialisé en Gestion des Entreprises</p>
                            <h2>2013 - 2015</h2>
                        
                        </div>
                </div>
                <div class="container left">
                        <div class="content">
                            <h1>Lycee IMAM BOUKHARI-Youssoufia</h1>
                            <p>baccalauréat science physique-chimie</p>
                            <h2>2012 - 2013</h2>
                            
                        </div>
                </div>
            </div>
        </div>
      


        <div class="ex">
            <h1 class="title">EXPERIENCE</h1>
            <div class="timeline">
            
                <div class="container right">
                        <div class="content">
                            <h1>Intelcappe</h1>
                            <p>web developpement</p>
                            <h2>juillet-aout</h2>
                            
                        </div>
                </div>
                <div class="container left">
                        <div class="content">
                            <h1>attawfiq-safi</h1>
                            <p>Agent de développement, </p>
                            <h2>2 Mars -3septembre 2018</h2>
                            
                        </div>
                </div>
                <div class="container right">
                        <div class="content">
                            <h1>AXA ASSURANCE-Youssoufia</h1>
                            <p>AGENT DE GESTION</p>
                            <h2>19 Janvier-18Fevrier2016</h2>
                            
                        </div>
                </div>
            
            </div>
        </div>
        
       
       
      


       
        
        <script src="app/js/script.js"></script>
    </div>

</body>
</html>