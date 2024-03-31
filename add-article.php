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
<title>Pridanie článku</title>
<body onload = time();>

<?php require_once "./header.php" ?>
<?php require_once 'libs/articles.php';

    if($_SESSION['usertype'] != "admin"){
        header("location: index.php");
    }
?>

<form action="add-article.php" method="post" class="article" enctype="multipart/form-data">
    <?php require_once 'libs/errors.php' ?>
    <fieldset>Nový článok</fieldset>
        
        <input type="text" name="title" placeholder="Nadpis článku" value="" required> 
        <label>Titulný obrázok (vlož obrázok na šírku)</label>
        <input type="file" name="article-images" value="">
        
        <textarea name="content" rows="8" placeholder="Obsah článku" required></textarea>                                                        
        <button class="submit" name="add-article">Odoslať</button>
</form>

<?php require_once "./footer.php" ?>

</body>
</html>