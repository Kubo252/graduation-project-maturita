<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Košice Západ</title>
<body onload = time();>

    <?php require_once "./header.php" ?>
    <?php require_once 'libs/users.php' ?>
    <?php require_once 'libs/db.php';
    ?>

    <?php 
        if (isset($_GET['article'])) {
            $id = $_GET['article'];
            $record = mysqli_query($db, "SELECT * FROM articles WHERE id=$id");

            $n = mysqli_fetch_array($record);
            $title = $n['title'];
            $img = $n['img'];
            $content = $n['content'];
            $datetime = $n['datetime'];
        }
    ?>
 
    <div class="content">
        <div class="article-content">
            <h1><?= $title ?></h1>
            <div class="mt-4" style="margin-left: 1.5%;">
                <i class="far fa-calendar-alt"></i> Dátum: 
                <?php
                    $time = "SELECT datetime FROM articles";
                    $cr_date=date_create($datetime);
                    $for_date=date_format($cr_date,'d.m.Y');                                
                    echo $for_date; 
                ?>                                    
            </div>                                    
            <div>
                <p><?= $content ?></p>
            </div>
            <?php if($img): ?>
                <img src="article-images/<?= $img ?>">
            <?php endif; ?>
        </div>
    </div>

    <?php require_once "./footer.php" ?>


</body>
</html>
