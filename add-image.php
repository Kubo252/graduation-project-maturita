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
<title>Pridanie fotografií v galérii</title>
<body onload = time();>

<?php require_once "./header.php" ?>
<?php require_once 'libs/images.php' ?>

<?php 

    if($_SESSION['usertype'] != "admin"){
        header("location: index.php");
    }
    
    if (isset($_GET['folder'])) {
        $id = $_GET['folder'];
    }
?>
<div class="content">
    <form action="add-image.php?folder=<?php echo $id; ?>" method="post" class="article" enctype="multipart/form-data">
        <fieldset>Fotografie</fieldset>    
        <label>Obrázok</label>
        <input type="file" name="gallery-images" value="" required> 
        
        <input type="text" name="description" placeholder="Popis obrázka" value="" required>    
        <input type="hidden" name="folder_id" value="<?php echo $id; ?>">                                                  
        
        <button class="submit" name="add-image">Pridať</button>

    </form>
    <div class="gallery-return">
        <a href="gallery.php">
            <button>Návrat na galériu</button>
        </a>
    </div>
</div>

<?php require_once "./footer.php" ?>

</body>
</html>