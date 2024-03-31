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
<style>
    @media only screen and (max-width: 460px) { 
        .content{
            margin-top: 0;
        }
    }
</style>
<title>Košice Západ</title>
<body onload = time();>

    <?php require_once "./header.php" ?>
    <?php require_once 'libs/users.php' ?>
    <?php require_once 'libs/db.php'; ?>

    <?php  
        /* aby získalo id pre podpriečinok */
        if (isset($_GET['folder'])) {
            $id = $_GET['folder'];                
        }
    
    ?>

    <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin'): ?>
        <div class="gallery-buttons">
            <button name="add-article" class="btn btn-info btn-lg">
                <a href="add-folder.php?folder=<?php echo $id; ?>">Pridať podpriečinok <i class="fa fa-folder"></i></a>
            </button>
            <button name="add-article" class="btn btn-info btn-lg">
                <a href="add-image.php?folder=<?php echo $id; ?>">Pridať obrázok do priečinka <i class="fas fa-image"></i></a>
            </button>
        </div>
        
    <?php endif; ?>        
   
    <div class="content">
        <?php 
            $id = $_GET['folder'];
            $results = mysqli_query($db, "SELECT * FROM gallery_folders WHERE parent=$id");
            $title = mysqli_query($db, "SELECT * FROM gallery_folders WHERE id=$id");
        ?>

        <?php $row = mysqli_fetch_assoc($title) ?>
        <h1 class="folder-title"><?php echo $row['folder'];?></h1>
                
        <div class="gallery">
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <div class="grid-item"> 
                    <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin' ):?>
                        <a href="delete-folder.php?delete=<?php echo $row['id']; ?>">
                            <button name="" class="btn btn-danger btn-lg" class="popup">
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

        <?php 
            $id = $_GET['folder'];
            $results = mysqli_query($db, "SELECT * FROM gallery_images WHERE folder_id=$id"); 
        ?>

        <div class="grid-images">
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>                                         
                <div class="img">
                    <?php  if (isset($_SESSION['user']) && $_SESSION['usertype'] == 'admin' ):?>
                        <a href="delete-image.php?folder=<?= $id ?>&delete=<?= $row['id'] ?>">
                            <button name="" class="btn btn-danger btn-lg" class="popup" style="right: auto;">
                                <i class="fa fa-trash"></i>                            
                            </button>
                        </a>                                                
                    <?php endif; ?>
                    <img src="gallery-images/<?= $row['img'] ?>" class="gallery-images" id="myImg" onclick="f(this)" alt="<?= $row['description'] ?>">
                </div>
                
                <div id="myModal" class="modal">
                    <span class="close-modal">&times;</span>
                    <img class="modal-content" id="img01" src="gallery-images/<?= $row['img'] ?>">
                    <div id="caption"></div>
                </div>
            <?php } ?>
        </div>        
    </div>

    <script>
        // získa daný obrázok
        var modal = document.getElementById("myModal");

        // alt ako popis obrázka
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        function f(imgs){
            modal.style.display = "block";
            modalImg.src = imgs.src;
            captionText.innerHTML = imgs.alt;
        }

        // získa <span> ktorý zatvortí obrázok
        var span = document.getElementsByClassName("close-modal")[0];

        // keď užívateľ klikne na "x", zavri obrázok
        span.onclick = function() { 
            modal.style.display = "none";
        }
        window.onkeyup = function (event) { // rovnako pri klávesovej skratke esc
            if (event.keyCode == 27) {
                modal.style.display = "none";
            }
        }
    </script>
 
    <?php require_once "./footer.php" ?>

</body>
</html>