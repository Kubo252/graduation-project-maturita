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
<title>Vytvorenie priečinkov v galérii</title>
<body onload = time();>

<?php require_once "./header.php" ?>   
<?php require_once 'libs/folders.php' ?>

<?php 

    if($_SESSION['usertype'] != "admin"){
        header("location: index.php");
    }
    
    if (isset($_GET['folder'])) {
        $id = $_GET['folder'];            
    }
    else{
        $id = NULL;
    }
?>
<div class="content">
    <form action="add-folder.php" method="post" enctype="multipart/form-data">
        <?php require_once 'libs/errors.php' ?>
        <fieldset>Nový priečinok</fieldset>
        <input type="text" name="folder" placeholder="Názov priečinka" value="" required> 
        <label>Titulný obrázok</label>
        <input type="file" name="gallery-images" value="" required> 
        <input type="hidden" name="id" value="<?php echo $id; ?>">                                                     
        <button class="submit" name="add-folder">Vytvoriť</button>
    </form>
</div>

<?php require_once "./footer.php" ?>

</body>
</html>