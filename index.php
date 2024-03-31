<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/homepage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Košice Západ</title>
<style>
    .content{
        padding: 0;
    }
</style>
<body onload = time();>
    
    <?php require_once "./header.php" ?>  
    <?php require_once 'libs/users.php' ?> 
    <?php require_once 'libs/db.php'; ?>

    <div class="content">
        <div class="slideshow">
            
        <?php $results = mysqli_query($db, "SELECT * FROM articles ORDER BY datetime DESC LIMIT 3"); ?>
                
        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
            <div class="slides">
                <img class="slide_img" src="article-images/<?= $row['img'] ?> ">
                <div class="description">
                    <h1> <a href="article.php?article=<?php echo $row['id']; ?>"><?= $row["title"] ?></a> </h1>                                                     
                    <p>
                        <i class="far fa-calendar-alt"></i>
                        <?php                                        
                            $cr_date=date_create($row['datetime']);
                            $for_date=date_format($cr_date,'d.M Y');                                
                            echo $for_date; 
                        ?>                                    
                    </p>
                </div>
            </div>     
        <?php } ?>
                        
        <a class="left_button" onclick="plusSlides(-1)"><img src="images/prev.png"></a>
        <a class="right_button" onclick="plusSlides(1)"><img src="images/next.png"></a>    
        </div>
        
        <div class="news-button">
            <a href="news.php"><button>Zobraziť všetky aktuality</button></a>
        </div>
    </div>
    
    <div class="homepage-grid">
        <div class="weather">
            <h2>Počasie</h2> 
            <i class="fas fa-cloud-sun"></i>        
            <a class="weatherwidget-io" href="https://forecast7.com/sk/48d6521d20/kosice-ii/" data-label_1="KOŠICE-ZÁPAD" data-label_2="Počasie" data-icons="Climacons Animated" data-theme="weather_one" >KOŠICE-ZÁPAD Počasie</a>
            <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){
                    js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';
                    fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
    </div>
        <div class="transport">
            <h2>Doprava</h2> 
            <i class='fas fa-bus'></i>
            <a href="https://imhd.sk/ke/"><img src="images/mhd.svg" alt=""></a> 
        </div>
    </div>
    

    <?php require_once "./footer.php" ?>
    
    <script src="script.js"></script>

</body>
</html>
