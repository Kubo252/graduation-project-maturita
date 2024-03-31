<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/gallery.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<title>Galéria</title>
 
<body onload = time();>
  
    <?php require_once "./header.php" ?>
 
    <div class="content">
        <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
            <button name="add-article" class="btn btn-info btn-lg">
                <a href="add-folder.php">Pridať nový priečinok <i class="fa fa-folder"></i></a>
            </button>
        <?php endif; ?>

        <?php $results = mysqli_query($db, "SELECT * FROM gallery_folders WHERE parent = 0"); ?>                        
        <h1>Galéria</h1>
        <div class="gallery">
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <div class="grid-item">
                    <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
                        <a href="delete-folder.php?delete=<?php echo $row['id']; ?>">
                            <button name="" class="btn btn-danger btn-lg" class="popup" onclick="confirmation()">
                                <i class="fa fa-trash"></i>                            
                            </button>
                        </a>                                                
                    <?php endif; ?>                    
                    <a class="folder-title" href="gallery-folder.php?folder=<?php echo $row['id']; ?>">
                        <img class="img-thumbnail opening-img" src="gallery-images/<?php echo $row['thumbnail']; ?> ">
                        <p><?= $row["folder"] ?></p>
                    </a>
                </div>
            <?php } ?>            
        </div>
    </div>

    <?php require_once "./footer.php" ?>

</body>
</html>